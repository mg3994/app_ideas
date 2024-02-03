import 'dart:io';

void main() async {
  final List<String> assetDirectories = [
    'assets', //add your own other like 'images' , 'fonts', 'google_fonts'
  ];
  final List<String> assetEntries = [];
  for (final directory in assetDirectories) {
    final assetsDirectory = Directory(directory);
    await _collectAssets(assetsDirectory, assetEntries);
  }
  // final assetsDirectory =
  //     Directory('assets'); // i also want to add "images" folder and 'fonts
  // await _collectAssets(assetsDirectory, assetEntries);
  await addAssetsToPubspecYaml(assetEntries);
  await generateConstantsDartFile(assetEntries);
}

Future<void> addAssetsToPubspecYaml(List<String> newAssetPaths) async {
  const pubspecPath = 'pubspec.yaml';

  // Read the existing pubspec.yaml file
  final pubspecFile = File(pubspecPath);
  if (!pubspecFile.existsSync()) {
    throw Exception('pubspec.yaml not found!');
  }

  final pubspecLines = await pubspecFile.readAsLines();
  final assetsKeyIndex = pubspecLines.indexWhere((line) => line.contains(RegExp(
      r'^ {2}assets:'))); //regex needed with two space at start of new line

  if (assetsKeyIndex == -1) {
    // 'assets:' key not found, adding it at the end
    pubspecLines.add('\n  assets:');
    for (final path in newAssetPaths) {
      pubspecLines.add('    - $path');
    }
  } else {
    // 'assets:' key exists, remove existing asset paths and add new ones
    final linesToRemove = <String>[];
    for (var i = assetsKeyIndex + 1; i < pubspecLines.length; i++) {
      final line = pubspecLines[i];
      if (line.trim().isEmpty || line.trimLeft().startsWith('#')) {
        continue; // Skip empty lines or comments
      }
      linesToRemove.add(line);
    }

    pubspecLines.removeWhere((line) => linesToRemove.contains(line));

    for (final path in newAssetPaths) {
      pubspecLines.insert(assetsKeyIndex + 1, '    - $path');
    }
  }

  // Write the updated pubspec.yaml file
  await pubspecFile.writeAsString(pubspecLines.join('\n'));
  stdout.writeln('All done! Assets Path Added in pubspec.yaml');
}

Future<void> _collectAssets(
    Directory directory, List<String> assetEntries) async {
  await for (final entity in directory.list()) {
    if (entity is File) {
      assetEntries.add('${entity.path.replaceAll(r'\', '/')}');
    } else if (entity is Directory) {
      assetEntries.add('${entity.path.replaceAll(r'\', '/')}/');
      await _collectAssets(entity, assetEntries);
    }
  }
}

Future<void> generateConstantsDartFile(List<String> resourceFolders) async {
  final generatedDir = Directory('lib/generated');
  if (!generatedDir.existsSync()) {
    generatedDir.createSync(recursive: true);
  }

  final constantsFile = File('lib/generated/assets_constants.dart');
  final content = StringBuffer();

  content.writeln('// Auto-generated file - Do not modify manually');
  content.writeln('abstract class AssetsConstants {');

  for (final folder in resourceFolders) {
    final constantName = _convertToCamelCase(folder);
  
    content.writeln('  static const String $constantName = \'$folder\';');
  }

  content.writeln('}');

  await constantsFile.writeAsString(content.toString());
  stdout.writeln(
      'Constants file generated at lib/generated/assets_constants.dart');
}

// Helper function to convert a path to Camel Case
String _convertToCamelCase(String input) {
  return input
      .toLowerCase()
      .split(RegExp(r'[/_-]'))
      .where((part) => part.isNotEmpty)
      .map((word) => word[0].toUpperCase() + word.substring(1))
      .join('')
      .replaceAll(RegExp(r'[./_-]'), '')
      .replaceFirstMapped(
          RegExp(r'^[A-Z]'), (match) => match.group(0)!.toLowerCase());
}

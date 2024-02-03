import 'dart:io';

void main() async {
  final assetsDirectory = Directory('assets');
  final List<String> assetEntries = [];
  await _collectAssets(assetsDirectory, assetEntries);
  await addAssetsToPubspecYaml(assetEntries);
}

Future<void> addAssetsToPubspecYaml(List<String> newAssetPaths) async {
  const pubspecPath = 'pubspec.yaml';

  // Read the existing pubspec.yaml file
  final pubspecFile = File(pubspecPath);
  if (!pubspecFile.existsSync()) {
    throw Exception('pubspec.yaml not found!');
  }

  final pubspecLines = await pubspecFile.readAsLines();
  final assetsKeyIndex =
      pubspecLines.indexWhere((line) => line.contains('  assets:'));

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

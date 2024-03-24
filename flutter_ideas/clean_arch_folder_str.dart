import 'dart:io';

void main() {
  // Define the base directory for the project
  String baseDir = 'lib';

  // Define the folder structure as a nested map
  Map<String, dynamic> folderStructure = {
    'core': {
      'error': ['exceptions.dart', 'failure.dart'],
      'params': [],
      'resources': [],
      'theme': [],
      'routes': [],
      'usecase': ['usecase.dart'],
      'app_core.dart': [],
      'app_strings.dart': [],
    },
    'data': {
      'datasources': {
        'local': ['local_data_source.dart'],
        'remote': ['remote_data_source.dart'],
      },
      'models': ['data_model.dart'],
      'repositories': ['repository.dart'],
    },
    'domain': {
      'entities': ['entity.dart'],
      'repositories': ['repository.dart'],
      'usecases': ['usecase.dart'],
    },
    'presentation': {
      'blocs': ['bloc.dart'],
      'pages': ['page.dart'],
      'widgets': ['widget.dart'],
    },
  };

  // Create folders and files recursively
  createFolders(baseDir, folderStructure);
}

void createFolders(String basePath, Map<String, dynamic> folderStructure) {
  folderStructure.forEach((name, content) {
    String newPath = '$basePath/$name';
    Directory(newPath).createSync(recursive: true);
    if (content is Map) {
      createFolders(newPath, content);
    } else if (content is List) {
      content.forEach((item) {
        if (item is String) {
          File('$newPath/$item').createSync();
        }
      });
    }
  });
  print('Folder structure created successfully!');
}

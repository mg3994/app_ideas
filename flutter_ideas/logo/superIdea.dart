import 'dart:io';

// Define the asset type enum
enum AssetType { image, font, shader, audio, video, lottie, json, rive, unknown }

// Define a class to represent an asset file
class FileAsset {
  final String filePath;
  FileAsset(this.filePath);

  String get fileExtension => filePath.split('.').last;

  AssetType get assetType => _getAssetType();
}

// Extension methods for FileAsset class
extension FileAssetExtension on FileAsset {
  AssetType _getAssetType() {
    switch (fileExtension) {
      case 'png':
      case 'jpeg':
      case 'webp':
      case 'svg':
        return AssetType.image;
      case 'otf':
      case 'ttf':
        return AssetType.font;
      case 'frag':
      case 'vert':
      case 'geom':
      case 'comp':
      case 'glsl':
      case 'spv':
        return AssetType.shader;
      case 'mp3':
      case 'wav':
      case 'aac':
      case 'ogg':
      case 'flac':
      case 'm4a':
        return AssetType.audio;
      case 'mp4':
      case 'mov':
      case 'avi':
      case 'mkv':
      case 'wmv':
        return AssetType.video;
      case 'lottie':
        return AssetType.lottie; //Don't take it serious , it is just for me , I just used lottie in place of json , don't worry for you i have something
      case 'json':
        return AssetType.json;
      case 'riv':
      case 'flr':
        return AssetType.rive;
      default:
        return AssetType.unknown;
    }
  }
}

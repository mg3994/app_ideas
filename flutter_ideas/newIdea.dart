import 'dart:io';

class FileAsset {
  final String filePath;
  FileAsset(this.filePath);

  String get fileExtension => filePath.split('.').last;
}

extension FileAssetExtension on FileAsset {
  Extension get extension => _getExtension(fileExtension);
  Type get type => _getType(fileExtension);
}

Extension _getExtension(String ext) {
  switch (ext) {
    case 'png': case 'jpeg': case 'webp': case 'svg': return Extension.image;
    case 'otf': case 'ttf': return Extension.font;
    case 'frag': case 'vert': case 'geom': case 'comp': case 'glsl': case 'spv': return Extension.shader;
    case 'mp3': case 'wav': case 'aac': case 'ogg': case 'flac': case 'm4a': return Extension.audio;
    case 'mp4': case 'mov': case 'avi': case 'mkv': case 'wmv': return Extension.video;
    case 'lottie': return Extension.lottie;
    case 'json': return Extension.json;
    case 'riv': case 'flr': return Extension.rive;
    default: return Extension.unknown;
  }
}

Type _getType(String ext) {
  switch (ext) {
    case 'png': case 'jpeg': case 'webp': case 'svg': return Type.image;
    case 'otf': case 'ttf': return Type.font;
    case 'frag': case 'vert': case 'geom': case 'comp': case 'glsl': case 'spv': return Type.shader;
    case 'mp3': case 'wav': case 'aac': case 'ogg': case 'flac': case 'm4a': return Type.audio;
    case 'mp4': case 'mov': case 'avi': case 'mkv': case 'wmv': return Type.video;
    case 'lottie': return Type.lottie;
    case 'json': return Type.json;
    case 'riv': case 'flr': return Type.rive;
    default: return Type.unknown;
  }
}

enum Extension { png, jpeg, webp, svg, otf, ttf, frag, vert, geom, comp, glsl, spv,
  mp3, wav, aac, ogg, flac, m4a, mp4, mov, avi, mkv, wmv, lottie, json, riv, flr, unknown }

enum Type { image, font, shader, audio, video, lottie, json, rive, unknown }

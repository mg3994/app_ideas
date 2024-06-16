# app_ideas

## Flutter Json Schema PubSpec Yaml
```json
{
    "$schema": "http://json-schema.org/draft-04/schema#",
    "$comment": "This should be kept in sync with the validator in packages/flutter_tools/lib/src/flutter_manifest.dart",
    "title": "pubspec.yaml",
    "type": "object",
    "additionalProperties": true,
    "properties": {
        "name": { "type": "string" },
        "flutter": {
            "oneOf": [
                { "type": "object" },
                { "type": "null" }
            ],
            "additionalProperties": false,
            "properties": {
                "uses-material-design": { "type": "boolean" },
                "assets": {
                    "type": "array",
                    "items": { "type": "string" }
                },
                "services": {
                    "type": "array",
                    "items": { "type": "string" }
                },
                "fonts": {
                    "type": "array",
                    "items": {
                        "type": "object",
                        "additionalProperties": false,
                        "properties": {
                            "family": { "type": "string" },
                            "fonts": {
                                "type": "array",
                                "items": {
                                    "type": "object",
                                    "additionalProperties": false,
                                    "properties": {
                                        "asset": { "type": "string" },
                                        "weight": { "enum": [ 100, 200, 300, 400, 500, 600, 700, 800, 900 ] },
                                        "style": { "enum": [ "normal", "italic" ] }
                                    }
                                }
                            }
                        }
                    }
                },
                "module": {
                    "type": "object",
                    "additionalProperties": false,
                    "properties": {
                        "androidX": { "type": "boolean" },
                        "androidPackage": { "type": "string" },
                        "iosBundleIdentifier": { "type": "string" }
                    }
                },
                "plugin": {
                    "type": "object",
                    "additionalProperties": false,
                    "properties": {
                        "platforms": {
                            "type": "object",
                            "additionalProperties": false,
                            "properties": {
                                "android": {
                                    "type": "object",
                                    "additionalProperties": false,
                                    "properties": {
                                        "package": {"type": "string"},
                                        "pluginClass": {"type": "string"}
                                    }
                                },
                                "ios": {
                                    "type": "object",
                                    "additionalProperties": false,
                                    "properties": {
                                        "pluginClass": {"type": "string"}
                                    }
                                },
                                "linux": {
                                    "type": "object",
                                    "additionalProperties": false,
                                    "properties": {
                                        "pluginClass": {"type": "string"},
                                        "dartPluginClass": {"type": "string"}
                                    }
                                },
                                "macos": {
                                    "type": "object",
                                    "additionalProperties": false,
                                    "properties": {
                                        "pluginClass": {"type": "string"},
                                        "dartPluginClass": {"type": "string"}
                                    }
                                },
                                "windows": {
                                    "type": "object",
                                    "additionalProperties": false,
                                    "properties": {
                                        "pluginClass": {"type": "string"},
                                        "dartPluginClass": {"type": "string"}
                                    }
                                }
                            }
                        },
                        "androidPackage": { "type": "string" },
                        "iosPrefix": { "type": "string" },
                        "macosPrefix": { "type": "string" },
                        "pluginClass": { "type": "string" }
                    }
                }
            }
        }
    }
}
```

### use of unawaited

```dart
void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  unawaited(MobileAds.instance.initialize());

  runApp(MyApp());
}
```

```php




<?php
function openFileInVSCode($filePath, $lineNumber, $highlightText) {
    // Command to open the file in VS Code and scroll to the specified line
    // Replace 'code' with the appropriate command for your system
    $command = "code --goto $filePath:$lineNumber";

    // Execute the command
    exec($command);

    // You might need to introduce some delay here to give VS Code time to open the file
    
    // Command to highlight text using the appropriate extension
    $highlightCommand = "code --command your.extension.highlightCommand $highlightText";

    // Execute the highlight command
    exec($highlightCommand);
}

$filePath = getEnvFilePath();
$lineNumber = 42;  // Line number where VITE_PUSHER_APP_CLUSTER is located
$highlightText = "VITE_PUSHER_APP_CLUSTER"; // Text to highlight

openFileInVSCode($filePath, $lineNumber, $highlightText);
?>

```



```php


<?php
function findLineNumberInFile($filePath, $targetText) {
    $lines = file($filePath);
    foreach ($lines as $lineNumber => $line) {
        if (strpos($line, $targetText) !== false) {
            return $lineNumber + 1; // Line numbers are 1-based
        }
    }
    return false; // Target text not found in the file
}

function openFileInVSCode($filePath, $lineNumber, $highlightText) {
    // Sanitize inputs
    $filePath = escapeshellarg($filePath);
    $lineNumber = intval($lineNumber); // Make sure it's an integer
    $highlightText = escapeshellarg($highlightText);

    // Command to open the file in VS Code and scroll to the specified line
    $openCommand = "code --goto $filePath:$lineNumber";

    // Execute the open command
    exec($openCommand);

    // // Introduce a delay
    // sleep(2); // Adjust the delay time as needed

    // // Command to highlight text using the appropriate extension
    // $highlightCommand = "code --command your.extension.highlightCommand $highlightText";

    // // Execute the highlight command
    // exec($highlightCommand);
}

$filePath = 'C:\learning\laravel\chiku\.env';
$highlightText = "VITE_PUSHER_APP_CLUSTER";

$lineNumber = findLineNumberInFile($filePath, $highlightText);
if ($lineNumber !== false) {
    openFileInVSCode($filePath, $lineNumber, $highlightText);
} else {
    echo "Text not found in the file.";
}
?>




```

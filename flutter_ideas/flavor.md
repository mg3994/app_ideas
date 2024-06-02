```
enum Flavors { test, dev, prod }

Flavors getFlavor() {
  const flavorString = String.fromEnvironment('FLUTTER_APP_FLAVOR');

  return switch (flavorString) {
    'test' => Flavors.test,
    'dev' => Flavors.dev,
    'prod' => Flavors.prod,
    _ => Flavors.prod,
  };
}

class Flavor {
  static Flavors get flavor => getFlavor();
  static String  get name => flavor.name;
  static String get commonPath => 'assets/common/';
  static String get flavorPath =>  'assets/$name/' ;
  // static Flavor of(BuildContext context) {
  //   return ModalRoute.of(context)!.settings.arguments as Flavor;
  // }
}
```
# assets also added 
```
flutter:
  
  uses-material-design: true
  # shaders:
  assets:
    - assets/common/
    - path: assets/test/
      flavors:
        - test
    - path: assets/dev/
      flavors:
        - dev
    - path: assets/prod/
      flavors:
        - prod
```

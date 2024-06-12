```dart
import 'package:flutter/material.dart';

void main() {
  runApp(
    MyApp(
      items: List<ListItem>.generate(
        1000,
        (i) => i % 6 == 0
            ? HeadingItem('Heading $i')
            : MessageItem('Sender $i', 'Message body $i'),
      ),
    ),
  );
}

class MyApp extends StatelessWidget {
  final List<ListItem> items;

  const MyApp({super.key, required this.items});

  @override
  Widget build(BuildContext context) {
    const title = 'Mixed List';

    return MaterialApp(
      title: title,
      home: Scaffold(
        appBar: AppBar(
          title: const Text(title),
        ),
        body: ListView.builder(
          // Let the ListView know how many items it needs to build.
          itemCount: items.length,
          // Provide a builder function. This is where the magic happens.
          // Convert each item into a widget based on the type of item it is.
          itemBuilder: (context, index) {
            final item = items[index];

            return ListTile(
              title: item.buildTitle(context),
              subtitle: item.buildSubtitle(context),
            );
          },
        ),
      ),
    );
  }
}

/// The base class for the different types of items the list can contain.
abstract class ListItem {
  /// The title line to show in a list item.
  Widget buildTitle(BuildContext context);

  /// The subtitle line, if any, to show in a list item.
  Widget buildSubtitle(BuildContext context);
}

/// A ListItem that contains data to display a heading.
class HeadingItem implements ListItem {
  final String heading;

  HeadingItem(this.heading);

  @override
  Widget buildTitle(BuildContext context) {
    return Text(
      heading,
      style: Theme.of(context).textTheme.headlineSmall,
    );
  }

  @override
  Widget buildSubtitle(BuildContext context) => const SizedBox.shrink();
}

/// A ListItem that contains data to display a message.
class MessageItem implements ListItem {
  final String sender;
  final String body;

  MessageItem(this.sender, this.body);

  @override
  Widget buildTitle(BuildContext context) => Text(sender);

  @override
  Widget buildSubtitle(BuildContext context) => Text(body);
}
```



```bash
📦 lib
 ┣ 📂core
 ┃ ┣ 📂error
 ┃ ┃ ┣ 📜exceptions.dart
 ┃ ┃ ┗ 📜failure.dart
 ┃ ┣ 📂params
 ┃ ┣ 📂resources
 ┃ ┣ 📂theme
 ┃ ┣ 📂routes
 ┃ ┗ 📂usecase
 ┃   ┗ 📜usecase.dart
 ┃ ┗ 📜app_core.dart
 ┃ ┗ 📜app_strings.dart
 ┣ 📂data
 ┃ ┣ 📂datasources
 ┃ ┃ ┣ 📂local
 ┃ ┃ ┃ ┗ 📜local_data_source.dart
 ┃ ┃ ┗ 📂remote
 ┃ ┃   ┗ 📜remote_data_source.dart
 ┃ ┣ 📂models
 ┃ ┃ ┗ 📜data_model.dart
 ┃ ┗ 📂repositories
 ┃   ┗ 📜repository.dart
 ┣ 📂domain
 ┃ ┣ 📂entities
 ┃ ┃ ┗ 📜entity.dart
 ┃ ┣ 📂repositories
 ┃ ┃ ┗ 📜repository.dart
 ┃ ┗ 📂usecases
 ┃   ┗ 📜usecase.dart
 ┗ 📂presentation
   ┣ 📂blocs
   ┃ ┗ 📜bloc.dart
   ┣ 📂pages
   ┃ ┗ 📜page.dart
   ┗ 📂widgets
     ┗ 📜widget.dart
📦 test
 ┣ 📂unit
 ┃ ┣ 📂core
 ┃ ┃ ┣ 📜exceptions_test.dart
 ┃ ┃ ┗ 📜failure_test.dart
 ┃ ┣ 📂data
 ┃ ┃ ┣ 📜local_data_source_test.dart
 ┃ ┃ ┗ 📜remote_data_source_test.dart
 ┃ ┣ 📂domain
 ┃ ┃ ┣ 📜entity_test.dart
 ┃ ┃ ┣ 📜repository_test.dart
 ┃ ┃ ┗ 📜usecase_test.dart
 ┃ ┗ 📂presentation
 ┃   ┣ 📜bloc_test.dart
 ┃   ┣ 📜page_test.dart
 ┃   ┗ 📜widget_test.dart
```

class IWProvider<T, U> extends InheritedWidget {
  final T state;
  final U stateWidget;

  const IWProvider(
      {required this.state,
      required this.stateWidget,
      super.key,
      required super.child});

  static T? of<T>(BuildContext context) {
    return context
        .dependOnInheritedWidgetOfExactType<IWProvider<T, dynamic>>()
        ?.stateWidget;
  }

  @override
  bool updateShouldNotify(covariant IWProvider<T, U> oldWidget) =>
      oldWidget.state != state;
  //  return oldWidget.state != state || oldWidget.stateWidget != stateWidget;
}

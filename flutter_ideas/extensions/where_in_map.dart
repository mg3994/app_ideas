
extension MapExtensions<K, V> on Map<K, V> {
  Map<K, V> where(bool Function(K key, V value) test) {
    Map<K, V> map = {};
    for (K key in keys) {
      final value = this[key];
      if (value != null && test(key, value)) {
        map.putIfAbsent(key, () => value);
      }
    }

    return map;
  }

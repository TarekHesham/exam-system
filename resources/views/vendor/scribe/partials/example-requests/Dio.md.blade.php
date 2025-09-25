@php
    use Knuckles\Scribe\Tools\WritingUtils as u;
    /** @var \Knuckles\Camel\Output\OutputEndpointData $endpoint */
@endphp
```dart
import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("{!! rtrim($baseUrl, '/') !!}/{{ ltrim($endpoint->boundUri, '/') }}");

  @if(count($endpoint->cleanQueryParameters))
  final queryParams = {!! u::printQueryParamsAsKeyValue($endpoint->cleanQueryParameters, "\"", ":", 4, "{}") !!};
  @else
  final queryParams = {};
  @endif

  final headers = {
    @foreach($endpoint->headers as $header => $value)
    '{{$header}}': '{{$value}}'@if(!$loop->last),@endif
    @endforeach
  };

  @php
    $isMultipart = $endpoint->hasFiles() || ($endpoint->headers['Content-Type'] ?? '') == 'multipart/form-data';
    $payload = count($endpoint->cleanBodyParameters)
        ? u::printPhpValue($endpoint->cleanBodyParameters, 0)
        : 'null';
  @endphp

  dynamic data;
  @if($isMultipart)
  final formData = FormData();

  @foreach($endpoint->cleanBodyParameters as $key => $value)
  formData.fields.add(MapEntry('{{$key}}', '{{$value}}'));
  @endforeach

  @foreach($endpoint->fileParameters as $key => $file)
  formData.files.add(MapEntry(
    '{{$key}}',
    await MultipartFile.fromFile('{{ $file->path() }}', filename: '{{ $file->name }}'),
  ));
  @endforeach

  data = formData;
  @elseif(count($endpoint->cleanBodyParameters))
  data = {!! $payload !!};
  @else
  data = null;
  @endif

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: '{{ $endpoint->httpMethods[0] }}',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}
```
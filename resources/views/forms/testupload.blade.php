<form role="form" method="POST" action="{{ url('/fileupload') }}" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="file" name="attachments[]" multiple/>
  <input name="save" type="submit" value="Save">
</form>
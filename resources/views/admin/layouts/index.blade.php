@include('admin.layouts.head')
@include('admin.layouts.navbar')
@include('admin.layouts.sidebar')
@include($data['content'], $data)
@include('admin.layouts.footer')

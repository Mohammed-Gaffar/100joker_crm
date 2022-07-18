@if($errors->any())
<script>
    swal.fire({
        icon: 'error',
        title: 'عذرا...',
        text: ' @foreach($errors->all() as $error )\n' +
                    '{{$error}}\n' +
            '   @endforeach' +
            '' +
            'توجد اخطاء في البيانات المدخلة\n ',
        footer: ''
    })
</script>
@endif






<script type="text/javascript">
    $(document).ready(function () {
        setInterval("HideNotification();",5000);

    })
    
    
    function HideNotification() {

        $("#notification").hide();
        
    }
</script>

@if ($errors->any())<!-- any errors show in products.create VIEW -->
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif


@if(session('success'))


    <div id="notification">
    <div class="alert alert-success"><h1 class="display-4">PRODUCT ADD </h1> </div>
    </div>

@endif

@if(session('delete'))

    <div id="notification">
        <div class="alert alert-danger"><h1 class="display-4">PRODUCT DELETE </h1> </div>
    </div>

    @endif
@if(session('edit'))

    <div id="notification">
        <div class="alert alert-succes"><h1 class="display-4">PRODUCT EDIT  </h1> </div>
    </div>

    @endif

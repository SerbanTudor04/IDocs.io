    <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
      });

      // TODO: Remove upgrade button via js

    </script>
    
    <script language='javascript'>
       
      window.onload = ()=>{
   let promo_link_div=document.getElementsByClassName('tox-promotion')
          promo_link_div.item(0).remove()
        let el_branding=document.getElementsByClassName('tox-statusbar__branding')
        el_branding.item(0).remove()
          
      }

   </script>
    {{-- <style>
        .tox-promotion-link{
          display: hidden !important;
        }
        .tox-promotion{
            opacity: 0;
        }
    </style>
   --}}

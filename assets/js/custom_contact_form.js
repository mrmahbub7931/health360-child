
(function ($) {

    "use strict";
    $("#presc_submit").on("click",function (event) {
        event.preventDefault();
        var form = $("#contact");
        
        var name = form.find("#name").val(),
        email = form.find("#email").val(),
        phone_number = form.find("#number").val(),
        address = form.find("#address").val(),
        // file = form.find("#file").val().replace(/C:\\fakepath\\/i, ''),
        ajaxurl = form.data('url');
        
        const formData = new FormData();

        const inpFiles = $("#file")[0].files;
        for ( const file of inpFiles ) {
            formData.append("files[]",file);
        }

        formData.append('action','custom_contact_form');
        formData.append('name',name);
        formData.append('email',email);
        formData.append('phone_number',phone_number);
        formData.append('address',address);

       

        
        $.ajax({
            url: ajaxurl,
            type: "post",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                form.find('.success_message').html("Your Application is Submitted Successfully!. One of our representative will contact you soon.");
                form.find('.success_message').css({'color':'#4CAF50'});
                $("#contact")[0].reset();
                
            }
        });
    })
    
    

    

})(jQuery);

// const inpFile = document.getElementById('file');
// const uploadBtn = document.getElementById('presc_submit');

// uploadBtn.addEventListener("click", function (e) {
//     e.preventDefault();
//     const xhr = new XMLHttpRequest();
//     const formData = new FormData();

//     for ( const file of inpFile.files ) {
//         formData.append("files[]",file);
//     }
// });
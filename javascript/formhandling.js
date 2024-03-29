$('#signup').validate({
    rules:{
        username: {
            required: true,
            minlength: 6,
            maxlength: 30
        },
        password: {
            required: true,
            minlength: 6,
            maxlength: 30
        },
        email: {
            required: true,
            email: true,
            maxlength: 30
        },
        cpassword:
        {
            equalTo: "#password"
        }
    },
    messages:{
    	username: {required: "Fylla þarf út í nafn. ", minlength: "notandanafn þarf að vera a.m.k 6 stafir. ", maxlength: "Notandanafn má ekki vera meira en 30 stafir. "},
    	email: {required: "Fylla þarf út í email. ", email:"Þetta er ekki gilt netfang. ", maxlength: "Netfang má ekki vera meira en 30 stafir. "},
    	password: {required: "Fylla þarf út í lykilorð. ", minlength: "Lykilorð þarf að vera a.m.k 6 stafir. ", maxlength: "Lykilorð má ekki vera meira en 30 stafir. "},
        cpassword: "Vinsamlega skrifaðu lykilorðið aftur eins."
    }
})


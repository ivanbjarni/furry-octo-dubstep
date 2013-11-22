$('form').validate({
    rules:{
        name: {
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
        }
    },
    messages:{
    	name: {required: "Filla þarf út í nafn", minlength: "notandanafn þarf að vera a.m.k 6 stafur", maxlength: "notandanafn má ekki vera meira en 30 stafir"},
    	email: {required: "Filla þarf út í email", email:"Þetta er ekki gilt netfang", maxlength: "notandanafn má ekki vera meira en 30 stafir"},
    	password: {required: "Filla þarf út í password", minlength: "notandanafn þarf að vera a.m.k 6 stafur", maxlength: "notandanafn má ekki vera meira en 30 stafir"}
    }
})

//username,pw,email max length: 30

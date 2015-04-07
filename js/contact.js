
// * Created by Bensly_000 on 10/9/2014.
//
// */

function buttonClick(form) {




    /* check name field is empty*/

    var name = form.Name.value;


    if (name == "" || fullname.length < 0) {

        alert("Please Enter your  Full Name");


    }


    else

        alert(name);


    /* check Address field is empty */


    var address = form.Address.value;


    if (address == "") {

        alert("Please Enter the Address")

    }

    else

        alert(address);


    /*check City field is empty*/


    var city = form.City.value

    if (city == "") {

        alert("Please Enter the City")

    }

    else

        alert(city);


    /* check Zip code */


    var code = form.ZipCode.value

    var isValid = /^[0-9]{5}(?:-[0-9]{4})?$/;

    if (code.match(isValid))

        alert(code);

    else {

        alert('Enter valid  ZipCode');

    }


    /* check  phonenumber Validation */


    var value = form.PhoneNumber.value;

    var phone = /^\d{10}$/;


    if (value.match(phone)) {

        alert(value);

    }

    else {

        alert("Enter the Phone Number");


    }


    /*   check Email validation*/


    var testresults;

    var str = form.Email.value;

    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i

    if (filter.test(str))

        testresults = true

    else {

        alert("Please input a valid email address!")

        testresults = false

    }

    return (testresults);
}

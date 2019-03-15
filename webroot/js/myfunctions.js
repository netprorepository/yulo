/*
    Author : Vincent Oti
    Date: 08/11/2017
    Description: custom js functions for project yulo.
*/


/*----------------------------------------------------*/
/*  check if email is valid
/*----------------------------------------------------*/
function isEmail(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

/*----------------------------------------------------*/
/*  check if passwords match
/*----------------------------------------------------*/

function submitRegistrationForm() {
    var regform = document.getElementById('regform');
    var username = document.getElementById('username2').value;
    var password1 = document.getElementById('password1').value;
    var password2 = document.getElementById('password2').value;
    var email = document.getElementById('email2').value;
    var fullname = document.getElementById('fullname').value;

    if(fullname == "" || fullname == null){
        document.getElementById('fullname').style.borderColor = "red";
    }else if (username == "" || username == null) {
        document.getElementById('username2').style.borderColor = "red";
    } else if (email == "" || email == null) {
        document.getElementById('email2').style.borderColor = "red";
    } else if (password1 == "" || password1 == null) {
        document.getElementById('password1').style.borderColor = "red";
    } else if (password2 == "" || password2 == null) {
        document.getElementById('password2').style.borderColor = "red";
    } else {
        if (password1 == password2) {
            if (isEmail(email)) {
                regform.submit();
            } else {
                document.getElementById('email2').style.borderColor = "red";
                document.getElementById('flash').style.display = "block";
                document.getElementById('content').innerHTML = "<span>Error!</span> Invalid Email Address.";
            }
        } else {
            document.getElementById('password2').style.borderColor = "red";
            document.getElementById('flash').style.display = "block";
            document.getElementById('content').innerHTML = "<span>Error!</span> Password Mix Match.";
        }
    }
}

/*----------------------------------------------------*/
/*  change password
/*----------------------------------------------------*/
function submitChangePasswordForm() {
    var passform = document.getElementById('passform');
    var oldpass = document.getElementById('oldpass').value;
    var newpass = document.getElementById('newpass').value;
    var confirmpass = document.getElementById('confirmpass').value;

    if (oldpass == null || oldpass == "") {
        document.getElementById('oldpass').style.borderColor = "red";
    } else if (newpass == null || newpass == "") {
        document.getElementById('newpass').style.borderColor = "red";
    } else if (confirmpass == null || confirmpass == "") {
        document.getElementById('confirmpass').style.borderColor = "red";
    } else {
        if (confirmpass == newpass) {
            passform.submit();
        } else {
            document.getElementById('confirmpass').style.borderColor = "red";
            document.getElementById('flash').style.display = "block";
            document.getElementById('content').innerHTML = "<span>Error!</span> Password Mix Match.";
        }
    }
}
/*----------------------------------------------------*/
/*  change password
/*----------------------------------------------------*/
function getImage() {
    var images = [];
    $('.dz-image > img').each(function() {
        images.push($(this).attr('src'));
    });
    for (var i = 0; i < images.length; i++) {
        console.log(images[i]);
    }

}

function submitPreview() {
    document.getElementById('frmFileUpload').submit();
}

/*----------------------------------------------------*/
/*  save bookmark
/*----------------------------------------------------*/
function saveBookmark(userid, listingid) {
   //console.log("something");return;
    var span = $("#bm").hasClass("liked");
    
    if (userid == "NULL" || userid =="") {
       // alert('sorry, you be loggedin to bookmark a property');
        $("#loginRegisterModal").modal();
    } else {

        $('.like-icon, .widget-button').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('liked');
            $(this).children('.like-icon').toggleClass('liked');
        });

        $.ajax({
            url: 'bookmarks/add/'+userid+'/'+listingid,
            method: 'POST',
            dataType: 'json',
            data: {
                bookMark: 1,
                userid: userid,
                listingid: listingid,
            },
            success: function(response) {
                alert('The property has been bookmarked');
               // console.log(response);
                //location.href = redirect;
            }
        });
    }
}

function saveBookmark22(userid, listingid) {
   var span = $("#bm").hasClass("liked");
    
    if (userid == "NULL" || userid == "") {
        //alert("You have to log in for this property to br added to your bookmark");
		$("#loginRegisterModal").modal();
    } else {

         $('.like-icon, .widget-button').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('liked');
            $(this).children('.like-icon').toggleClass('liked');
        });

        $.ajax({
           url: '../bookmarks/add/'+userid+'/'+listingid,
            method: 'POST',
            dataType: 'text',
            data: {
                bookMark: 1,
                userid: userid,
                listingid: listingid,
            },
            success: function(response) {
                alert('The property has been bookmarked');
                //console.log(response);
                //location.href = redirect;
            }
        });
    }
}





function addtomybookmark(userid, listingid) {
      
    if (userid == "NULL" || userid == "") {
        alert("You have to log in for this property to be added to your bookmark");
        (this).hasClass('liked').removeClass('liked');
       $(".like-icon").removeClass("liked");
        document.getElementsByClassName('like-icon').removeClass('liked');
       $(this).removeClass('liked');
       $(this).children('.like-icon').removeClass('liked');
        return;
        
		//$("#loginRegisterModal").modal();
    } else {

         $('.like-icon, .widget-button').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('liked');
            $(this).children('.like-icon').toggleClass('liked');
            //var span = $("#bm").hasClass("liked");
        });

        $.ajax({
           url: '/yulo/bookmarks/bookmarksimilarproperty/'+userid+'/'+listingid,
            method: 'POST',
            dataType: 'json',
            data: {
                bookMark: 1,
                userid: userid,
                listingid: listingid
            },
            success: function(response) {
                alert('The property has been bookmarked');
                //console.log(response);
                //location.href = redirect;
            }
        });
    }
}



function getCatType(catid){

    $.ajax({
        url: '../properties/categorytypes/'+catid,
        method: 'POST',
        dataType: 'text',
        success: function(response) {
            //console.log(response);
            document.getElementById('categorytype1').innerHTML = "";
            document.getElementById('categorytype1').innerHTML = response;
            //location.href = redirect;
        }
    });

}

function getCatType2(catid){

    $.ajax({
        url: 'properties/categorytypes2/'+catid,
        method: 'POST',
        dataType: 'text',
        success: function(response) {
            //console.log(response);
            document.getElementById('categorytype1').innerHTML = "";
            document.getElementById('categorytype1').innerHTML = response;
            //location.href = redirect;
        }
    });

}

function getCities(cityid){

    $.ajax({
        url: '../properties/cities/'+cityid,
        method: 'POST',
        dataType: 'text',
        success: function(response) {
            //console.log(response);
            document.getElementById('cities1').innerHTML = "";
            document.getElementById('cities1').innerHTML = response;
            //location.href = redirect;
        }
    });

}


function filterHostel(text){
    $.ajax({
        url: '../properties/filterhostel/'+text,
        method: 'POST',
        dataType: 'text',
        success: function(response) {
            //console.log(response);return;
            document.getElementById('hosteldiv').innerHTML = "";
            document.getElementById('hosteldiv').innerHTML = response;
        }
    });
}

function filterAgent(text){
    $.ajax({
        url: '../agents/filteragent/'+text,
        method: 'POST',
        dataType: 'text',
        success: function(response) {
            //console.log(response);return;
            document.getElementById('agentdiv').innerHTML = "";
            document.getElementById('agentdiv').innerHTML = response;
        }
    });
}

/*----------------------------------------------------*/
/*  addToCompare
/*----------------------------------------------------*/
function addToCompare(id, imgs, title, cat, price) {
    var db = window.openDatabase("listingDB", "1.0", "My WebSQL test database", 5 * 1024 * 1024);
    if (!db) {
        console.log("Your db was created successfully");
    }

    db.transaction(
        function(tx) {
            tx.executeSql(
                "CREATE TABLE IF NOT EXISTS yulo_listing (listing_id INTEGER PRIMARY KEY, img TEXT, title TEXT, cat TEXT, price TEXT)", [],
                onSuccessExecuteSql,
                onError
            )
        },
        onError,
        onReadyTransaction
    )

    db.transaction(
        function(tx) {
            tx.executeSql("INSERT INTO yulo_listing(listing_id,img,title,cat,price) VALUES(?,?,?,?,?)", [id, imgs, title, cat, price],
                onSuccessExecuteSql,
                onError)
        },
        onError,
        onReadyTransaction
    )


    db.transaction(
        function(tx) {
            tx.executeSql("SELECT * FROM yulo_listing", [],
                displayResults,
                onError)
        },
        onError,
        onReadyTransaction
    )
}

function onReadyTransaction() {
    //  console.log('Transaction completed')
}

function onSuccessExecuteSql(tx, results) {
    // console.log('Execute SQL completed')
}

function onError(err) {
    // console.log(err)
}

function displayResults(tx, results) {
    var baseurl = document.getElementById('baseurl').value;
    var basket = document.getElementById('csm-properties');

    if (results.rows.length == 0) {
        // console.log("No records found");
    }

    var row = "";
    for (var i = 0; i < results.rows.length; i++) {
        var listingitem = document.createElement('div');
        listingitem.setAttribute("class", "listing-item compact");
        basket.appendChild(listingitem);

        var a = document.createElement('a');
        a.setAttribute("class", "listing-img-container");
        a.href = "";
        listingitem.appendChild(a);

        var removefromcompare = document.createElement('div');
        removefromcompare.setAttribute("class", "remove-from-compare");
        a.appendChild(removefromcompare);

        var ix = document.createElement('i');
        ix.setAttribute("class", "fa fa-close");
        removefromcompare.appendChild(ix);

        var listingbadges = document.createElement('div');
        listingbadges.setAttribute("class", "listing-badges");
        a.appendChild(listingbadges);

        var span = document.createElement('span');
        span.innerHTML = "" + results.rows.item(i).cat + "";
        listingbadges.appendChild(span);

        var listingimgcontent = document.createElement('div');
        listingimgcontent.setAttribute("class", "listing-img-content");
        a.appendChild(listingimgcontent);
        var span1 = document.createElement('span');
        span1.setAttribute("class", "listing-compact-title");
        span1.innerHTML = "" + results.rows.item(i).title + "";
        listingimgcontent.appendChild(span1);

        var i2 = document.createElement('i');
        i2.innerHTML = "" + results.rows.item(i).price + "";
        span1.appendChild(i2);

        var img = document.createElement('img');
        img.setAttribute("alt", "");
        img.setAttribute("src", "" + baseurl + "/upload/" + results.rows.item(i).img + "");
        a.appendChild(img);
    }
}

/*----------------------------------------------------*/
/*  clearCompare
/*----------------------------------------------------*/

function clearCompare() {
    console.log("clear compare");
    var db = window.openDatabase("listingDB", "1.0", "My WebSQL test database", 5 * 1024 * 1024);
    if (!db) {
        //console.log("Your db was created successfully");
    }

    db.transaction(
        function(tx) {
            tx.executeSql(
                "DELETE FROM yulo_listing", [],
                onSuccessExecuteSql,
                onError
            )
        },
        onError,
        onReadyTransaction
    )
    window.location.reload();
}

/*----------------------------------------------------*/
/*  display Compare
/*----------------------------------------------------*/
function dislayCompare() {
    var db = window.openDatabase("listingDB", "1.0", "My WebSQL test database", 5 * 1024 * 1024);
    if (!db) {
        //console.log("Your db was created successfully");
    }

    db.transaction(
        function(tx) {
            tx.executeSql("SELECT * FROM yulo_listing", [],
                displayResults2,
                onError)
        },
        onError,
        onReadyTransaction
    )

    function displayResults2(tx, results) {
        var baseurl = document.getElementById('baseurl').value;
        var basket = document.getElementById('csm-properties');

        if (results.rows.length == 0) {
            //console.log("No records found");
        }

        var row = "";
        for (var i = 0; i < results.rows.length; i++) {
            var listingitem = document.createElement('div');
            listingitem.setAttribute("class", "listing-item compact");
            basket.appendChild(listingitem);

            var a = document.createElement('a');
            a.setAttribute("class", "listing-img-container");
            a.href = "";
            listingitem.appendChild(a);

            var removefromcompare = document.createElement('div');
            removefromcompare.setAttribute("class", "remove-from-compare");
            a.appendChild(removefromcompare);

            var ix = document.createElement('i');
            ix.setAttribute("class", "fa fa-close");
            removefromcompare.appendChild(ix);

            var listingbadges = document.createElement('div');
            listingbadges.setAttribute("class", "listing-badges");
            a.appendChild(listingbadges);

            var span = document.createElement('span');
            span.innerHTML = "" + results.rows.item(i).cat + "";
            listingbadges.appendChild(span);

            var listingimgcontent = document.createElement('div');
            listingimgcontent.setAttribute("class", "listing-img-content");
            a.appendChild(listingimgcontent);
            var span1 = document.createElement('span');
            span1.setAttribute("class", "listing-compact-title");
            span1.innerHTML = "" + results.rows.item(i).title + "";
            listingimgcontent.appendChild(span1);

            var i2 = document.createElement('i');
            i2.innerHTML = "" + results.rows.item(i).price + "";
            span1.appendChild(i2);

            var img = document.createElement('img');
            img.setAttribute("alt", "");
            img.setAttribute("src", "" + baseurl + "/upload/" + results.rows.item(i).img + "");
            a.appendChild(img);
        }
    }
}

/*----------------------------------------------------*/
/*  move To Compare
/*----------------------------------------------------*/


function moveToCompare() {
    var baseurl = $("#baseurl").val();
    var y = [];
    var db = window.openDatabase("listingDB", "1.0", "My WebSQL test database", 5 * 1024 * 1024);
    if (!db) {
        //console.log("Your db was created successfully");
    }

    db.transaction(
        function(tx) {
            tx.executeSql("SELECT * FROM yulo_listing", [],
                displayResults2,
                onError)
        },
        onError,
        onReadyTransaction
    )

    function displayResults2(tx, results) {
        for (var i = 0; i < results.rows.length; i++) {
            y.push(results.rows.item(i).listing_id);
            console.log(y);
        }
        window.location.href = baseurl + "/compare-property/" + y + "/";
    }
}
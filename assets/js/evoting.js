/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getVal(value) {
    alert(value);
    document.getElementById('partyName').value = "sent";
    //send this value to php. select the values and send them back in
}


/**********************GETS THE XMLHTTP OBJECT REFERENCE **********************************/
var xmlHttp = createXmlHttpRequestObject();
function createXmlHttpRequestObject()
{
    var xmlHttp;
    //if running IE 6 and older
    if (window.ActiveXObject) {
        try {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {
            xmlHttp = false;
        }
    } else {
        try {
            xmlHttp = new XMLHttpRequest();
            document.write("object created</br>");
        } catch (e) {
            xmlHttp = false;
        }
    }

    if (!xmlHttp) {
        alert("Error creating xmlHttprequest object");
    } else {
        return xmlHttp;
    }
}

function party_process(value) {
    //proceed only if the xmlhttp object is not busy
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0) {
        //document.write("xmlhttp ready </br>");
        //retrive the name typed by the userAgent
        //var name = encodeURIComponent(document.getElementById("edit_btn").value);
        var id = encodeURIComponent(value);

        //execute the php page from the server
        //document.write("uri encoded AND NAME =: " + name +  " </br>");
        xmlHttp.open("GET", "party_ajax_response.php?id=" + id, true);//making it false will make the request synchronized
        //define the method to handle server response
        xmlHttp.onreadystatechange = party_handleServerResponse;
        //make the server request
        xmlHttp.send(null);//triggers the request 	AND null could be other parameters if the request type was POST
    } else {
        //if the connection is busy try, try again after 1 second
        document.write("connection busy</br>");
        setTimeout('party_process()', 10000000);
    }
}

function party_handleServerResponse() {
    //move forward if only the transaction is committed
    if (xmlHttp.readyState == 4) {
        //status of 200 indicates the transaction completed successfully
        if (xmlHttp.status == 200) {

            var jsonResponse = xmlHttp.responseText;
            console.log("json response: " + jsonResponse);

            var jsnObj = JSON.parse(jsonResponse);

            var d = jsnObj.pop();
            console.log("party name: " + d.PARTY_NAME);
            document.getElementById("hidden_id").value = d.ID;
            document.getElementById("partyName").value = d.PARTY_NAME;
            document.getElementById("partyCode").value = d.PARTY_CODE;
            document.getElementById("region").value = d.REGION;
            document.getElementById("logoName").value = d.LOGO_NAME;
            //document.getElementById("partyLogo").value = d.LOGO_PATH;
            document.getElementById("afterlogopath").innerHTML = d.LOGO_PATH;
            document.getElementById("candidateNo").value = d.NO_OF_CAN;
            document.getElementById("listConst").value = d.LIST_OF_CONST;
            document.getElementById("listPs").value = d.LIST_OF_PS;
            document.getElementById("objective").value = d.OBJECTIVE;


            console.log("the returned id: " + d.ID);

            setTimeout('party_process()', 10000000);
        } else {
            //http status different from  200 signals an error
            alert("There was a problem accessing The server: " + xmlHttp.statusText);
        }
    }
}
function displayId(value) {
    console.log("function id is: " + value);
}

function const_process(value) {
    //proceed only if the xmlhttp object is not busy
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0) {
        //document.write("xmlhttp ready </br>");
        //retrive the name typed by the userAgent
        //var name = encodeURIComponent(document.getElementById("edit_btn").value);
        var id = encodeURIComponent(value);

        //execute the php page from the server
        //document.write("uri encoded AND NAME =: " + name +  " </br>");
        xmlHttp.open("GET", "const_ajax_response.php?id=" + id, true);//making it false will make the request synchronized
        //define the method to handle server response
        xmlHttp.onreadystatechange = const_handleServerResponse;
        //make the server request
        xmlHttp.send(null);//triggers the request 	AND null could be other parameters if the request type was POST
    } else {
        //if the connection is busy try, try again after 1 second
        document.write("connection busy</br>");
        setTimeout('const_process()', 10000000);
    }
}

function const_handleServerResponse() {
    //move forward if only the transaction is committed
    if (xmlHttp.readyState == 4) {
        //status of 200 indicates the transaction completed successfully
        if (xmlHttp.status == 200) {

            var jsonResponse = xmlHttp.responseText;
            console.log("json response: " + jsonResponse);

            var jsnObj = JSON.parse(jsonResponse);

            var d = jsnObj.pop();
            console.log("const code: " + d.CONST_CODE);
            console.log("const name: " + d.CON_NAME);
            console.log("const region: " + d.REGION);
            console.log("list of poll stations: " + d.lIST_OF_PS);

            document.getElementById("hidden_id2").value = d.ID;
            document.getElementById("conCode").value = d.CONST_CODE;
            document.getElementById("conName").value = d.CON_NAME;
            document.getElementById("const_region").value = d.REGION;
            document.getElementById("Nops").value = d.NO_OF_PS;
            document.getElementById("listOfPs").innerHTML = d.lIST_OF_PS;
            document.getElementById("remark").value = d.REMARKS;


            console.log("the returned id: " + d.ID);

            setTimeout('const_process()', 10000000);
        } else {
            //http status different from  200 signals an error
            alert("There was a problem accessing The server: " + xmlHttp.statusText);
        }
    }
}
function ps_process(value) {
    //proceed only if the xmlhttp object is not busy
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0) {
        //document.write("xmlhttp ready </br>");
        //retrive the name typed by the userAgent
        //var name = encodeURIComponent(document.getElementById("edit_btn").value);
        var id = encodeURIComponent(value);

        //execute the php page from the server
        //document.write("uri encoded AND NAME =: " + name +  " </br>");
        xmlHttp.open("GET", "ps_ajax_response.php?id=" + id, true);//making it false will make the request synchronized
        //define the method to handle server response
        xmlHttp.onreadystatechange = ps_handleServerResponse;
        //make the server request
        xmlHttp.send(null);//triggers the request 	AND null could be other parameters if the request type was POST
    } else {
        //if the connection is busy try, try again after 1 second
        document.write("connection busy</br>");
        setTimeout('ps_process()', 10000000);
    }
}
function ps_handleServerResponse(){
    //move forward if only the transaction is committed
    if (xmlHttp.readyState == 4) {
        //status of 200 indicates the transaction completed successfully
        if (xmlHttp.status == 200) {

            var jsonResponse = xmlHttp.responseText;
            console.log("json response: " + jsonResponse);

            var jsnObj = JSON.parse(jsonResponse);

            var d = jsnObj.pop();
            
            console.log("ps code: " + d.PS_CODE);
            console.log("ps name: " + d.PS_NAME);
            console.log("const code: " + d.CONST_CODE);
            console.log("REGION: " + d.REGION);
            console.log("subcity: " + d.SUBCITY);
            console.log("WOREDA: " + d.WOREDA);
            console.log("KEBELE: " + d.KEBELE);
            console.log("RMARKS: " + d.REMRAKS);
            

            document.getElementById("hidden_id3").value = d.ID;
            document.getElementById("psCode").value = d.PS_CODE;
            document.getElementById("psName").value = d.PS_NAME;
            document.getElementById("ps_conCode").value = d.CONST_CODE
            document.getElementById("ps_region").value = d.REGION;
            document.getElementById("subcity_zone").value = d.SUBCITY;
            document.getElementById("woreda").value = d.WOREDA;
            document.getElementById("kebele").value = d.KEBELE;
            document.getElementById("remarks").value = d.REMRAKS;


            console.log("the returned id: " + d.ID);

            setTimeout('ps_process()', 10000000);
        } else {
            //http status different from  200 signals an error
            alert("There was a problem accessing The server: " + xmlHttp.statusText);
        }
    }
}
function can_process(value) {
    //proceed only if the xmlhttp object is not busy
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0) {
        //document.write("xmlhttp ready </br>");
        //retrive the name typed by the userAgent
        //var name = encodeURIComponent(document.getElementById("edit_btn").value);
        var id = encodeURIComponent(value);

        //execute the php page from the server
        //document.write("uri encoded AND NAME =: " + name +  " </br>");
        xmlHttp.open("GET", "can_ajax_response.php?id=" + id, true);//making it false will make the request synchronized
        //define the method to handle server response
        xmlHttp.onreadystatechange = can_handleServerResponse;
        //make the server request
        xmlHttp.send(null);//triggers the request 	AND null could be other parameters if the request type was POST
    } else {
        //if the connection is busy try, try again after 1 second
        document.write("connection busy</br>");
        setTimeout('can_process()', 10000000);
    }
}

function can_handleServerResponse(){
    //move forward if only the transaction is committed
    if (xmlHttp.readyState == 4) {
        //status of 200 indicates the transaction completed successfully
        if (xmlHttp.status == 200) {

            var jsonResponse = xmlHttp.responseText;
            console.log("json response: " + jsonResponse);

            var jsnObj = JSON.parse(jsonResponse);
            var d_pop = jsnObj.pop();
            
            console.log("candidate id: " + d_pop.ID);
            console.log("candidate fname: " + d_pop.FIRST_NAME);
            console.log("candidate lname: " + d_pop.LAST_NAME);
            console.log("candidate gender: " + d_pop.GENDER);
            var date = new Date(d_pop.DOB);
            d = date.getFullYear()+'-' + (date.getMonth()+1) + '-'+date.getDate();
            console.log("candidate dob " + d);
            console.log("candidate birthplace: " + d_pop.BIRTH_PLACE);
            console.log("education level " + d_pop.EDUCATION_LEVEL);
            console.log("phtot_path " + d_pop.PHOTO_PATH);
            console.log("can_type " + d_pop.CAN_TYPE);
            console.log("running_code " + d_pop.RUNNING_CODE);
            console.log("promises " + d_pop.PROMISES);
            

            document.getElementById("hidden_id4").value = d_pop.ID;
            document.getElementById("canFName").value = d_pop.FIRST_NAME;
            document.getElementById("canLName").value = d_pop.LAST_NAME;
            
            if(d_pop.GENDER == 'male'){
                document.getElementById("genMale").checked = true;   
            }else{
                document.getElementById("genFemale").checked = true;
            }
            
            document.getElementById("dob").value = d;
            document.getElementById("birthPlace").value = d_pop.BIRTH_PLACE;
            document.getElementById("eduLevel").value = d_pop.EDUCATION_LEVEL;
            document.getElementById("photo_span").value = d_pop.PHOTO_PATH;
           
           if(d_pop.CAN_TYPE == 'Party Based'){
               document.getElementById('canParty').checked = true;
           }else{
               document.getElementById('canPrivate').checked = true;
           }
            document.getElementById("canCode").value = d_pop.RUNNING_CODE;
            document.getElementById("promise").value = d_pop.PROMISES;

            console.log("the returned id: " + d_pop.ID);

            setTimeout('can_process()', 10000000);
        } else {
            //http status different from  200 signals an error
            alert("There was a problem accessing The server: " + xmlHttp.statusText);
        }
    }
}
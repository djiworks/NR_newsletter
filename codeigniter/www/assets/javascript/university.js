/* Global variables */
var numContact = 0;
var nbInput = new Array();
 

/* Functions */
function selectedUniv (univName, univId, chkName) {
	//Creation of variables
	//~ var chkName = "chk".concat(univId);
	var checkBoxState = document.getElementById(chkName).checked;
	
	//Creation or removal of the universty from the list
	if(checkBoxState === true) {
		addUniv(univName, univId, chkName);
	} else {
		removeUniv(univId, chkName);
	}
}

function addUniv(univName, univId, chkName) {
	//Creation of the new li element
	var newElementInList = document.createElement('li');
	newElementInList.id = "li".concat(univId);
	
	//Creation of the label
	var newLabel = document.createElement('label');
	newLabel.class = "checkbox inline";

	//Creation of the input
	var newInput = document.createElement('input');
	newInput.type = "checkbox";
	newInput.id = "inlineCheckbox1";
	newInput.value = "option1";
	newInput.checked = true;
	newInput.setAttribute("onclick", "removeUniv(\""+univId+"\",\""+chkName+"\")");
	
	//Creation of the link
	var newLink = document.createElement('a');
	var newLinkText = document.createTextNode(" ".concat(univName));
	newLink.href = "#myModal";
	newLink.setAttribute("data-toggle", "modal");
	newLink.appendChild(newLinkText);

	//appending the elements all together
	newLabel.appendChild(newInput);
	newLabel.appendChild(newLink);
	newElementInList.appendChild(newLabel);

	//appending the new list element to the list
	document.getElementById("divListUniv").appendChild(newElementInList);
}

function removeUniv(univId, chkName) {
	//Creation of variables
	var listElementToRemove = "li".concat(univId);
	var listElem = document.getElementById(listElementToRemove);
	
	//Removal of the university from the list
	listElem.parentNode.removeChild(listElem);
	
	//Uncheck the checkbox
	document.getElementById(chkName).checked = false;
}

function unselectAll() {
	//Get all the children of the ul element
	var arrayLi = document.getElementById("divListUniv");

	//We remove the element in the list
	while(arrayLi.hasChildNodes()){
		arrayLi.removeChild(arrayLi.lastChild);
	}
	
	//Uncheck all the checkboxes
	var arrayInput = document.getElementsByTagName("input");
	
	for(var i = 0 ; i < arrayInput.length ; i++) {
		if(arrayInput[i].type == 'checkbox') {
			arrayInput[i].checked = false;
		}
	}
}

function selectAll() {
	//Check all the checkboxes
	var arrayInput = document.getElementById("accordion").getElementsByTagName("input");
	var nbCheckbox = arrayInput.length;
	
	for(var i = 0 ; i < nbCheckbox ; i++) {
		if(arrayInput[i].getAttribute('type') == 'checkbox') {
			if(arrayInput[i].checked == false) {						
				arrayInput[i].checked = true;
				var tmpString = arrayInput[i].getAttribute('onclick');
				var arrayString = tmpString.split('"');
				
				addUniv(arrayString[1], arrayString[3], arrayString[5]);
			}
		}
	}
}

function getAllCheckedUniversities() {
	//Check all the checkboxes
	var arrayInput = document.getElementById("accordion").getElementsByTagName("input");
	var nbCheckbox = arrayInput.length;
	var list = new Array();
	var y = 0;
	for(var i = 0 ; i < nbCheckbox ; i++) {
		if(arrayInput[i].getAttribute('type') == 'checkbox') {
			if(arrayInput[i].checked == true) {
				list[y] = document.getElementById("classNumber" + arrayInput[i].id).innerHTML;
				y = y+1;					
			}
		}
	}
		var result = list.join(',');
		document.getElementById('sendNewsletterList').value = result ;
		$('#sendNewsletterModal').modal('show');
}

function confirmationAdding(is_success){
	if(is_success == 1)
	{
		$('#failure').modal('show');
	}
	else if(is_success == 0)
	{
		$('#success').modal('show');
	}
	else if(is_success == 2)
	{
		$('#success_deletion').modal('show');
	}
	else if(is_success == 3)
	{
		$('#success_sending').modal('show');
	}
}

function deleteUniversity(id){						
	document.getElementById('confirmDeletionId').value = id ;
	$('#confirmDeletion').modal('show');
}
		
function modifyUniversity(id){						
	//~ document.getElementById('modifyId').value = id ;
	$('#modifyUniversity').modal('show');
}

function changeName(id) {
	/* This function changes the name so it is easier for the user 
	 * to find the user he added 
	 */
	 
	//Getting the field and its value
	var e = document.getElementById("linkDisplayContact"+id);
	var info = document.getElementById("textAreaInfoContact"+id);
	
	//changing the value
	if (!info.value) {
		e.innerHTML = "New contact ".concat(id);
	} else {
		if(info.value.length > 24) {
			//If there is more than 24 characters, we cut the name
			e.innerHTML = info.value.substr(0, 24).concat("...");
		} else {
			e.innerHTML = info.value;
		}
	}
}

function delInternForm(id) {
	/*
	 * This function deletes an intern in the form
	 */
	var e = document.getElementById("groupIntern"+id);
	e.parentNode.removeChild(e);
	
	nbInput[id][1] = 0;
	nbInput[id][2] = 0;
}

function saveArrayNbInput() {
	/*
	 * This function saves the array nbInput
	 */
	
	document.getElementById("nbInputPhoneMail").value = nbInput.join();
}

function addField(field, contactNum) {
	//This function adds an input for the mail in the form 
	//to add a contact to a university  
	
	//Save the number of input for each contact to know how many fields 
	//are supposed to be displayed
	
	//alert("nbInput["+contactNum+"] = "+nbInput[contactNum]+"\nnbInput["+contactNum+"][1] = "+nbInput[contactNum][1]+"\nnbInput["+contactNum+"][2] = "+nbInput[contactNum][2]);
	
	if(field == "mail") {
		nbInput[contactNum][1]++;
		
		if(nbInput[contactNum][1] <= nbInput[contactNum][2]) {
			document.getElementById("inputEmail"+contactNum+nbInput[contactNum][1]).style.visibility = "visible";
		} else {
			createField(contactNum, field, nbInput[contactNum][1]);
		}
	} else {
		nbInput[contactNum][2]++;
		
		if(nbInput[contactNum][2] <= nbInput[contactNum][1]) {
			document.getElementById("inputPhone"+contactNum+nbInput[contactNum][2]).style.visibility = "visible";
			document.getElementById("inputCheckFax"+contactNum+nbInput[contactNum][2]).style.visibility = "visible";
		} else {
			createField(contactNum, field, nbInput[contactNum][2]);
		}
	} 
}

function createField(contactNum, field, fieldNum) {
	//Creation of the new elements
	var element = document.getElementById("TableContainer"+contactNum);
	
	var trTag = document.createElement('tr');
	var tdTagMail = document.createElement('td');
	var tdTagPhone = document.createElement('td');
	
	//Creation of the div for the e-mail
	var newElementDivMail = document.createElement('div');
	newElementDivMail.class = "control-group";
	
	var newDivMail = document.createElement('div');
	newDivMail.class = "controls";
	
	var newInputMail = document.createElement('input');
	newInputMail.type = "text";
	newInputMail.id = "inputEmail".concat(contactNum).concat(fieldNum);
	
	newInputMail.name = "inputEmail".concat(contactNum).concat(fieldNum);
	newInputMail.setAttribute("class", "input-medium");
	newInputMail.placeholder = "Email";
	
	newDivMail.appendChild(newInputMail);
	
	newElementDivMail.appendChild(newDivMail);
	
	//Creation of the div for the phone
	var newElementDivPhone = document.createElement('div');
	newElementDivPhone.class = "control-group";
	
	var newDivPhone = document.createElement('div');
	newDivPhone.class = "controls";
	
	var newInputPhone = document.createElement('input');
	newInputPhone.type = "text";
	newInputPhone.id = "inputPhone".concat(contactNum).concat(fieldNum);
	newInputPhone.name = "inputPhone".concat(contactNum).concat(fieldNum);
	newInputPhone.setAttribute("class", "input-medium");
	newInputPhone.placeholder = "Phone";
	
	//In case the number is for a fax
	var newCheckFax = document.createElement('input');
	newCheckFax.type = "checkbox";
	newCheckFax.id = "inputCheckFax".concat(contactNum).concat(fieldNum);
	newCheckFax.name = "inputCheckFax".concat(contactNum).concat(fieldNum);
	
	newDivPhone.appendChild(newInputPhone);
	newDivPhone.appendChild(newCheckFax);
	
	newElementDivPhone.appendChild(newDivPhone);
	
	tdTagMail.appendChild(newElementDivMail);
	tdTagPhone.appendChild(newElementDivPhone);
	
	trTag.appendChild(tdTagMail);
	trTag.appendChild(tdTagPhone);
	
	element.appendChild(trTag);
	
	//Change the style so only one appears
	if(field == "phone") {
		newInputMail.style.visibility = "hidden";
	} else {
		newInputPhone.style.visibility = "hidden";
		newCheckFax.style.visibility = "hidden";
	}
}

var funcAddContactToUniv = function addInternToUniv() {
	/*
	 * This function adds in the form the fields to add an intern
	 * to the university that is added
	 */
	
	numContact++;
	nbInput[numContact] = numContact;
	nbInput[numContact] = new Array();
	nbInput[numContact][1] = 1;
	nbInput[numContact][2] = 1;
	
	
	var cell = document.getElementById("cellContact");
	cell.style.visibility = "visible";
	
	var e = document.getElementById("accordion");
	
	//Creation of the div for the additional information
	var newElementDivInfo = document.createElement('div');
	newElementDivInfo.className = "control-group";
	
	var newLabelInfo = document.createElement('label');
	newLabelInfo.class = "control-label";
	newLabelInfo.for = "textAreaInfoContact".concat(numContact);
	newLabelInfo.innerHTML = "Additional Information";
	
	var newDivInfo = document.createElement('div');
	newDivInfo.class = "controls";
	
	var newTextAreaInfo = document.createElement('textarea');
	newTextAreaInfo.rows = "3";
	newTextAreaInfo.id = "textAreaInfoContact".concat(numContact);
	newTextAreaInfo.name = "textAreaInfoContact".concat(numContact);
	newTextAreaInfo.placeholder = "Additional Information";
	newTextAreaInfo.setAttribute("onblur","changeName("+numContact+");");
	
	newDivInfo.appendChild(newTextAreaInfo);
	
	newElementDivInfo.appendChild(newLabelInfo);
	newElementDivInfo.appendChild(newDivInfo);
	
	//Structure for the phone and mail
	//Creation of the table
	var newTableContainer = document.createElement('table');
	newTableContainer.id = "TableContainer".concat(numContact);
	
	//Header of the table
	var newTableHead = document.createElement('thead');
	
	//Header Mail
	var newTableHeadThMail = document.createElement('th');
	newTableHeadThMail.innerHTML = "Mail";
	
	var newIconMail = document.createElement('i');
	newIconMail.setAttribute("class", "icon-plus-sign");
	newIconMail.setAttribute("onclick", "addField('mail', "+numContact+")");
	
	newTableHeadThMail.appendChild(newIconMail);
	
	//Header phone
	var newTableHeadThPhone = document.createElement('th');
	newTableHeadThPhone.innerHTML = "Phone";
	
	var newIconPhone = document.createElement('i');
	newIconPhone.setAttribute("class", "icon-plus-sign");
	newIconPhone.setAttribute("onclick", "addField('phone', "+numContact+")");
	
	newTableHeadThPhone.appendChild(newIconPhone);
	
	//Body of the table
	var newTableBody = document.createElement('tbody');
	var newTableBodyTdMail = document.createElement('td');
	var newTableBodyTdPhone = document.createElement('td');
	
	//Creation of the div for the e-mail
	var newElementDivMail = document.createElement('div');
	newElementDivInfo.class = "control-group";
	
	var newDivMail = document.createElement('div');
	newDivMail.class = "controls";
	
	var newInputMail = document.createElement('input');
	newInputMail.type = "text";
	newInputMail.id = "inputEmail".concat(numContact).concat("1");
	newInputMail.name = "inputEmail".concat(numContact).concat("1");
	newInputMail.setAttribute("class", "input-medium");
	newInputMail.placeholder = "Email";
	newDivMail.appendChild(newInputMail);
	
	newElementDivMail.appendChild(newDivMail);
	
	newTableBodyTdMail.appendChild(newElementDivMail);
	
	//Creation of the div for the phone
	var newElementDivPhone = document.createElement('div');
	newElementDivPhone.class = "control-group";
	
	var newDivPhone = document.createElement('div');
	newDivPhone.class = "controls";
	
	var newInputPhone = document.createElement('input');
	newInputPhone.type = "text";
	newInputPhone.id = "inputPhone".concat(numContact).concat("1");
	newInputPhone.name = "inputPhone".concat(numContact).concat("1");
	newInputPhone.setAttribute("class", "input-medium");
	newInputPhone.placeholder = "Phone";
	
	//In case the number is for a fax
	var newCheckFax = document.createElement('input');
	newCheckFax.type = "checkbox";
	newCheckFax.id = "inputCheckFax".concat(numContact).concat("1");
	newCheckFax.name = "inputCheckFax".concat(numContact).concat("1");
	
	newDivPhone.appendChild(newInputPhone);
	newDivPhone.appendChild(newCheckFax);
	//~ newDivPhone.appendChild(newLabelFax);
	
	newElementDivPhone.appendChild(newDivPhone);
	
	var newElementDivBlock = document.createElement('div');
	newElementDivBlock.id = "blockAddIntern";
	
	var newElementDivInner = document.createElement('div');
	newElementDivInner.class = "accordion-inner";
	
	var newElementDivcollapse = document.createElement('div');
	newElementDivcollapse.id = "collapse".concat(numContact);
	newElementDivcollapse.class = "accordion-body collapse";
	
	//Creation of the header for the accordion
	var newElementLink = document.createElement('a');
	newElementLink.id = "linkDisplayContact".concat(numContact);
	newElementLink.class = "accordion-toggle";
	newElementLink.setAttribute("data-toggle", "collapse");
	newElementLink.setAttribute("data-parent", "#accordion");
	newElementLink.href = "#collapse".concat(numContact);
	newElementLink.innerHTML = "New contact ".concat(numContact);
	
	var newElementButton = document.createElement('button');
	newElementButton.type = "button";
	newElementButton.setAttribute("class", "close");
	newElementButton.setAttribute("data-dismiss", "modal");
	newElementButton.setAttribute("aria-hidden", "true");
	newElementButton.innerHTML = "&times;";
	newElementButton.setAttribute("onclick","delInternForm("+numContact+");");
	
	var newElementDivHead = document.createElement('div');
	newElementDivHead.class = "accordion-heading";
	
	var newElementDivModal = document.createElement('div');
	newElementDivModal.class = "modal-header";
		 
	//Assembling the elements together
	/* Head */
	newElementDivModal.appendChild(newElementLink);
	newElementDivModal.appendChild(newElementButton);
	newElementDivHead.appendChild(newElementDivModal);
	
	/* inner */
	//Appending the header of the table
	var trTag = document.createElement('tr');
	
	trTag.appendChild(newTableHeadThMail);
	trTag.appendChild(newTableHeadThPhone);
	
	newTableHead.appendChild(trTag);
	
	delete trTag;
	
	//Appending the body of the table
	//Appending the inputs into the cells
	var trTag = document.createElement('tr');
	
	newTableBodyTdMail.appendChild(newElementDivMail);
	newTableBodyTdPhone.appendChild(newElementDivPhone);
	
	trTag.appendChild(newTableBodyTdMail);
	trTag.appendChild(newTableBodyTdPhone);
	
	newTableBody.appendChild(trTag);
	
	delete trTag;
	
	newTableContainer.appendChild(newTableHead);
	newTableContainer.appendChild(newTableBody);
	
	newElementDivInner.appendChild(newElementDivInfo);
	newElementDivInner.appendChild(newTableContainer);
	newElementDivcollapse.appendChild(newElementDivInner);
	
	/* group */
	var newElementDivGroup = document.createElement('div');
	newElementDivGroup.id = "groupIntern".concat(numContact);
	newElementDivGroup.class = "accordion-group wrapTab";
	
	newElementDivGroup.appendChild(newElementDivHead);
	newElementDivGroup.appendChild(newElementDivcollapse);
	
	e.appendChild(newElementDivGroup);
	
	/* To have the number of intern to add for the university */
	document.getElementById("nbContact2Add").value = numContact;
}

var funcSearch = function search(field, field) {
	/*
	 * This function does the search in the page
	 */
	
	//~ Field is optional so we can use this function for other searches
	//~ field = (field ? field : null);
	 
	//~ alert("element = "+element.value);
	
	//~ var stuff = document.getElementsByTagName("li");
	
	//~ alert(stuff.length);
	//~ alert("stuff[56].innerHTML = "+stuff[56].innerHTML);
	
	//~ for (var i = 1 ; i <= stuff.length ; i++) {
		//~ if((stuff[i].className == "className")) {
			//~ //alert("stuff["+i+"].className = "+stuff[i].className);
			//~ alert("stuff["+i+"].innerHTML = "+stuff[i].innerHTML);
			//~ alert("element.value = "+element.value);
			//~ 
			//~ var test = element.value.test.stuff[i].innerHTML;
			//~ 
			//~ alert("test = "+test);
			//~ 
			//~ if(stuff[i].innerHTML.test.element.value) {
				//~ stuff[i].style.background = "red";
			//~ }
		//~ }
	//~ }
	
	//~ alert("i = "+i);
}


/* Listeners */
//~ Listener to add interns for a university
var element = document.getElementById('buttonAddContact');
element.addEventListener('click', funcAddContactToUniv, false);

//~ Listener for the search in the main university page
//~ var element = document.getElementById('inputSearchUniv');
//~ element.addEventListener('keyup', funcSearch("inputSearchUniv"), false);

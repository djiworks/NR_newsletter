/* Global variables */
var numContact = 0;

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
	
	for(var i = 0 ; i <= arrayInput.length ; i++) {
		if(arrayInput[i].type == 'checkbox') {
			arrayInput[i].checked = false;
		}
	}
}

function selectAll() {
	//Check all the checkboxes
	var arrayInput = document.getElementById("accordion").getElementsByTagName("input");
	var nbCheckbox = arrayInput.length;
	
	for(var i = 0 ; i <= nbCheckbox ; i++) {
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
}

var funcAddContactToUniv = function addInternToUniv() {
	/*
	 * This function adds in the form the fields to add an intern
	 * to the university that is added
	 */
	numContact++;
	
	var cell = document.getElementById("cellContact");
	cell.style.visibility = "visible";
	
	var e = document.getElementById("accordion");
	
	//Creation of the div for the additional information
	var newElementDivInfo = document.createElement('div');
	newElementDivInfo.className = "control-group";
	
	var newLabelInfo = document.createElement('label');
	newLabelInfo.class = "control-label";
	newLabelInfo.for = "textAreaInfoContact".concat(numContact);
	newLabelInfo.innerText = "Additional Information";
	
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
	
	//Creation of the div for the e-mail
	var newElementDivMail = document.createElement('div');
	newElementDivInfo.class = "control-group";
	
	var newLabelMail = document.createElement('label');
	newLabelMail.class = "control-label";
	newLabelMail.for = "inputEmail".concat(numContact);
	newLabelMail.innerText = "Email";
	
	var newDivMail = document.createElement('div');
	newDivMail.class = "controls";
	
	var newInputMail = document.createElement('input');
	newInputMail.type = "text";
	newInputMail.id = "inputEmail".concat(numContact);
	newInputMail.name = "inputEmail".concat(numContact);
	newInputMail.setAttribute("class", "input-medium");
	newInputMail.placeholder = "Email";
	newDivMail.appendChild(newInputMail);
	
	newElementDivMail.appendChild(newLabelMail);
	newElementDivMail.appendChild(newDivMail);
	
	//Creation of the div for the phone
	var newElementDivPhone = document.createElement('div');
	newElementDivPhone.class = "control-group";
	
	var newLabelPhone = document.createElement('label');
	newLabelPhone.class = "control-label";
	newLabelPhone.for = "inputPhone".concat(numContact);
	newLabelPhone.innerText = "Phone";
	
	var newDivPhone = document.createElement('div');
	newDivPhone.class = "controls";
	
	var newInputPhone = document.createElement('input');
	newInputPhone.type = "text";
	newInputPhone.id = "inputPhone".concat(numContact);
	newInputPhone.name = "inputPhone".concat(numContact);
	newInputPhone.setAttribute("class", "input-medium");
	newInputPhone.placeholder = "Phone";
	
	var newLabelFax = document.createElement('label');
	newLabelFax.class = "control-label";
	newLabelFax.for = "inputCheckFax".concat(numContact);
	newLabelFax.innerText = "Fax";
	
	var newCheckFax = document.createElement('input');
	newCheckFax.type = "checkbox";
	newCheckFax.id = "inputCheckFax".concat(numContact);
	newCheckFax.name = "inputCheckFax".concat(numContact);
	
	newDivPhone.appendChild(newInputPhone);
	newDivPhone.appendChild(newCheckFax);
	newDivPhone.appendChild(newLabelFax);
	
	newElementDivPhone.appendChild(newLabelPhone);
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
	newElementDivBlock.appendChild(newElementDivInfo);
	newElementDivBlock.appendChild(newElementDivMail);
	newElementDivBlock.appendChild(newElementDivPhone);
	
	newElementDivInner.appendChild(newElementDivBlock);
	
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

/* Global variables */
var nbIntern = 0;

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
	var name = document.getElementById("inputNameContact"+id).value;
	
	//changing the value
	if (name.length === 0) {
		e.innerHTML = "New intern ".concat(id);
	} else {
		e.innerHTML = name;
	}
}

function delInternForm(id) {
	/*
	 * This function deletes an intern in the form
	 */
	var e = document.getElementById("groupIntern"+id);
	e.parentNode.removeChild(e);
}

var funcAddInternToUniv = function addInternToUniv() {
	/*
	 * This function adds in the form the fields to add an intern
	 * to the university that is added
	 */
	nbIntern++;
	
	var cell = document.getElementById("cellIntern");
	cell.style.visibility = "visible";
	
	var e = document.getElementById("accordion");
	
	//Creation of the div for the first name input
	var newElementDivFirstName = document.createElement('div');
	newElementDivFirstName.className = "control-group";
	
	var newLabelFirstName = document.createElement('label');
	newLabelFirstName.class = "control-label";
	newLabelFirstName.for = "inputNameFirstName".concat(nbIntern);
	newLabelFirstName.innerText = "Contact name";
	
	var newDivFirstName = document.createElement('div');
	newDivFirstName.class = "controls";
	
	var newInputFirstName = document.createElement('input');
	newInputFirstName.type = "text";
	newInputFirstName.id = "inputNameFirstName".concat(nbIntern);
	newInputFirstName.name = "inputNameFirstName".concat(nbIntern);
	newInputFirstName.placeholder = "Contact first name";
	newInputFirstName.setAttribute("onblur","changeName("+nbIntern+", 'first');");
	
	newDivFirstName.appendChild(newInputFirstName);
	
	newElementDivFirstName.appendChild(newLabelFirstName);
	newElementDivFirstName.appendChild(newDivFirstName);
	
	//Creation of the div for the last name input
	var newElementDivLastName = document.createElement('div');
	newElementDivLastName.className = "control-group";
	
	var newLabelLastName = document.createElement('label');
	newLabelLastName.class = "control-label";
	newLabelLastName.for = "inputNameLastContact".concat(nbIntern);
	newLabelLastName.innerText = "Contact name";
	
	var newDivLastName = document.createElement('div');
	newDivLastName.class = "controls";
	
	var newInputLastName = document.createElement('input');
	newInputLastName.type = "text";
	newInputLastName.id = "inputNameLastContact".concat(nbIntern);
	newInputLastName.name = "inputNameLastContact".concat(nbIntern);
	newInputLastName.placeholder = "Contact last name";
	newInputLastName.setAttribute("onblur","changeName("+nbIntern+", 'last');");
	
	newDivLastName.appendChild(newInputLastName);
	
	newElementDivLastName.appendChild(newLabelLastName);
	newElementDivLastName.appendChild(newDivLastName);
	
	//Creation of the div for the additional information
	var newElementDivInfo = document.createElement('div');
	newElementDivInfo.className = "control-group";
	
	var newLabelInfo = document.createElement('label');
	newLabelInfo.class = "control-label";
	newLabelInfo.for = "inputInfoContact".concat(nbIntern);
	newLabelInfo.innerText = "Additional Information";
	
	var newDivInfo = document.createElement('div');
	newDivInfo.class = "controls";
	
	var newTextAreaInfo = document.createElement('textarea');
	newTextAreaInfo.rows = "3";
	newTextAreaInfo.name = "inputInfoContact".concat(nbIntern);
	newTextAreaInfo.placeholder = "Additional Information";
	
	newDivInfo.appendChild(newTextAreaInfo);
	
	newElementDivInfo.appendChild(newLabelInfo);
	newElementDivInfo.appendChild(newDivInfo);
	
	//Creation of the div for the e-mail
	var newElementDivMail = document.createElement('div');
	newElementDivInfo.class = "control-group";
	
	var newLabelMail = document.createElement('label');
	newLabelMail.class = "control-label";
	newLabelMail.for = "inputEmail".concat(nbIntern);
	newLabelMail.innerText = "Email";
	
	var newDivMail = document.createElement('div');
	newDivMail.class = "controls";
	
	var newInputMail = document.createElement('input');
	newInputMail.type = "text";
	newInputMail.id = "inputEmail".concat(nbIntern);
	newInputMail.name = "inputEmail".concat(nbIntern);
	newInputMail.placeholder = "Email";
	
	newDivMail.appendChild(newInputMail);
	
	newElementDivMail.appendChild(newLabelMail);
	newElementDivMail.appendChild(newDivMail);
	
	//Creation of the div for the phone
	var newElementDivPhone = document.createElement('div');
	newElementDivPhone.class = "control-group";
	
	var newLabelPhone = document.createElement('label');
	newLabelPhone.class = "control-label";
	newLabelPhone.for = "inputPhone".concat(nbIntern);
	newLabelPhone.innerText = "Phone";
	
	var newDivPhone = document.createElement('div');
	newDivPhone.class = "controls";
	
	var newInputPhone = document.createElement('input');
	newInputPhone.type = "text";
	newInputPhone.id = "inputPhone".concat(nbIntern);
	newInputPhone.name = "inputPhone".concat(nbIntern);
	newInputPhone.placeholder = "Phone";
	
	newDivPhone.appendChild(newInputPhone);
	
	newElementDivPhone.appendChild(newLabelPhone);
	newElementDivPhone.appendChild(newDivPhone);	
	
	var newElementDivBlock = document.createElement('div');
	newElementDivBlock.id = "blockAddIntern";
	
	var newElementDivInner = document.createElement('div');
	newElementDivInner.class = "accordion-inner";
	
	var newElementDivcollapse = document.createElement('div');
	newElementDivcollapse.id = "collapse".concat(nbIntern);
	newElementDivcollapse.class = "accordion-body collapse";
	
	//Creation of the header for the accordion
	var newElementLink = document.createElement('a');
	newElementLink.id = "linkDisplayContact".concat(nbIntern);
	newElementLink.class = "accordion-toggle";
	newElementLink.setAttribute("data-toggle", "collapse");
	newElementLink.setAttribute("data-parent", "#accordion");
	newElementLink.href = "#collapse".concat(nbIntern);
	newElementLink.innerHTML = "New intern ".concat(nbIntern);
	
	var newElementButton = document.createElement('button');
	newElementButton.type = "button";
	newElementButton.setAttribute("class", "close");
	newElementButton.setAttribute("data-dismiss", "modal");
	newElementButton.setAttribute("aria-hidden", "true");
	newElementButton.innerHTML = "&times;";
	newElementButton.setAttribute("onclick","delInternForm("+nbIntern+");");
	
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
	newElementDivBlock.appendChild(newElementDivFirstName);
	newElementDivBlock.appendChild(newElementDivLastName);
	newElementDivBlock.appendChild(newElementDivInfo);
	newElementDivBlock.appendChild(newElementDivMail);
	newElementDivBlock.appendChild(newElementDivPhone);
	
	newElementDivInner.appendChild(newElementDivBlock);
	
	newElementDivcollapse.appendChild(newElementDivInner);
	
	/* group */
	var newElementDivGroup = document.createElement('div');
	newElementDivGroup.id = "groupIntern".concat(nbIntern);
	newElementDivGroup.class = "accordion-group wrapTab";
	
	newElementDivGroup.appendChild(newElementDivHead);
	newElementDivGroup.appendChild(newElementDivcollapse);
	
	e.appendChild(newElementDivGroup);
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
var element = document.getElementById('button2AddIntern');
element.addEventListener('click', funcAddInternToUniv, false);

//~ Listener for the search in the main university page
//~ var element = document.getElementById('inputSearchUniv');
//~ element.addEventListener('keyup', funcSearch("inputSearchUniv"), false);

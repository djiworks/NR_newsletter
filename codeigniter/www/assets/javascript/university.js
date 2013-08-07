/* Global variables */
var nbIntern = 0;
/* Listeners */
//~ var element = document.getElementById('inputSearchUniv');
 //~ 
//~ element.addEventListener('keyup', function(e) {
	//~ //alert("element = "+element.value);
	//~ 
	//~ var stuff = document.getElementsByTagName("li");
	//~ 
	//~ //alert(stuff.length);
	//~ //alert("stuff[56].innerHTML = "+stuff[56].innerHTML);
	//~ 
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
	//~ 
	//~ //alert("i = "+i);
//~ }, false);

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
	 * to find the user he added */
	 
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

var funcAddInternToUniv = function addInternToUniv() {
	nbIntern++;
	
	var cell = document.getElementById("cellIntern");
	cell.style.visibility = "visible";
	
	var e = document.getElementById("accordion");
	
	//Creation of the div for the name input
	var newElementDivName = document.createElement('div');
	newElementDivName.className = "control-group";
	
	var newLabelName = document.createElement('label');
	newLabelName.class = "control-label";
	newLabelName.for = "inputNameContact".concat(nbIntern);
	newLabelName.innerText = "Contact name";
	
	var newDivName = document.createElement('div');
	newDivName.class = "controls";
	
	var newInputName = document.createElement('input');
	newInputName.type = "text";
	newInputName.id = "inputNameContact".concat(nbIntern);
	newInputName.name = "inputNameContact".concat(nbIntern);
	newInputName.placeholder = "Contact name";
	newInputName.setAttribute("onblur","changeName("+nbIntern+");");
	newDivName.appendChild(newInputName);
	
	newElementDivName.appendChild(newLabelName);
	newElementDivName.appendChild(newDivName);
	
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
	/*
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4>Failure</h4>
		</div>
	*/
	
	var newElementLink = document.createElement('a');
	newElementLink.id = "linkDisplayContact".concat(nbIntern);
	newElementLink.class = "accordion-toggle";
	newElementLink.setAttribute("data-toggle", "collapse");
	newElementLink.setAttribute("data-parent", "#accordion");
	newElementLink.href = "#collapse".concat(nbIntern);
	newElementLink.innerHTML = "New intern ".concat(nbIntern);
	
	var newElementButton = document.createElement('button');
	newElementButton.type = "button";
	newElementButton.class = "close";
	newElementButton.setAttribute("data-dismiss", "modal");
	newElementButton.setAttribute("aria-hidden", "true");
	newElementButton.innerHTML = "&times;";
	
	var newElementDivHead = document.createElement('div');
	newElementDivHead.class = "accordion-heading";
	
	var newElementDivModal = document.createElement('div');
	newElementDivModal.class = "modal-header";
		 
	//Assembling the elements together
	/* Head */
	newElementDivModal.appendChild(newElementButton);
	newElementDivModal.appendChild(newElementLink);
	newElementDivHead.appendChild(newElementDivModal);
	
	/* inner */
	newElementDivBlock.appendChild(newElementDivName);
	newElementDivBlock.appendChild(newElementDivInfo);
	newElementDivBlock.appendChild(newElementDivMail);
	newElementDivBlock.appendChild(newElementDivPhone);
	
	newElementDivInner.appendChild(newElementDivBlock);
	
	newElementDivcollapse.appendChild(newElementDivInner);
	
	/* group */
	var newElementDivGroup = document.createElement('div');
	newElementDivGroup.class = "accordion-group wrapTab";
	
	newElementDivGroup.appendChild(newElementDivHead);
	newElementDivGroup.appendChild(newElementDivcollapse);
	
	e.appendChild(newElementDivGroup);
}

/* Listeners */
var element = document.getElementById('button2AddIntern');
element.addEventListener('click', funcAddInternToUniv, false);

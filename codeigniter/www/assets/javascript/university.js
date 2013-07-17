		function selectedUniv (univName, univId) {
			//Creation of variables
			var chkName = "chk".concat(univId);
			var checkBoxState = document.getElementById(chkName).checked;
			
			//Creation or removal of the universty from the list
			if(checkBoxState === true) {
				addUniv(univName, univId);
			} else {
				removeUniv(univId);
			}
		}
	
		function addUniv(univName, univId) {
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
			newInput.setAttribute("onclick", "removeUniv("+univId+")");
			
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
		
		function removeUniv(univId) {
			//Creation of variables
			var listElementToRemove = "li".concat(univId);
			var listElem = document.getElementById(listElementToRemove);
			
			//Removal of the university from the list
			listElem.parentNode.removeChild(listElem);
			
			//Uncheck the checkbox
			document.getElementById("chk"+univId).checked = false;
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
			var arrayInput = document.getElementById("displayUnivList").getElementsByTagName("input");
			var nbCheckbox = arrayInput.length;
			
			for(var i = 0 ; i <= nbCheckbox*2 ; i++) {
				if(arrayInput[i].getAttribute('type') == 'checkbox') {
					if(arrayInput[i].checked == false) {						
						arrayInput[i].checked = true;
						var tmpString = arrayInput[i].getAttribute('onclick');
						var arrayString = tmpString.split("'");
						addUniv(arrayString[1], arrayString[3]);
					}
				}
			}
		}
const addTag = (checkbox)=>{
    const tagListDiv = document.getElementById("tagList");

    if(checkbox.checked){
        const tagId = checkbox.id.substring(4);
        const inputHidden = document.createElement("input");
        inputHidden.setAttribute("type", "hidden");
        inputHidden.setAttribute("value", tagId);
        inputHidden.setAttribute("name", "tags[]");
        inputHidden.setAttribute("id", `hidden-${tagId}`);

        tagListDiv.appendChild(inputHidden);
    }
    else{
        const tagId = checkbox.id.substring(4);
        document.getElementById(`hidden-${tagId}`).remove();
    }

}

window.addTag = addTag;


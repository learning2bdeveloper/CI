async function deleteOrgData(value) {
    let confirmation = confirm('Are you sure you want to delete this?');
    if(confirmation) {
        try 
            {
            let data = new FormData();
            data.append('id', value);
            const response = await fetch('create_organization/services/Create_organization_service/delete', {
                method: 'POST',
                body: data
            });
        
            if (response.ok) {
                // Handle successful response
                console.log('Form submitted successfully');

                reloadTable();
                
            } else {
                // Handle error response
                console.error('Error submitting form:', response.statusText);
            }
        
            }catch(error) 
            {
            console.error('Error submitting form:', error);
            }
    }
    
}



async function OpenModalUpdateOrgData(value) {
  const myModal = new bootstrap.Modal(document.getElementById('editModal'));
    try {
    let data = new FormData();
    data.append('id', value);

    const response = await fetch('Create_organization/get_single_organization_info', {
        method: 'POST',
        body: data
    });
    const info =await response.json();

    if (response.ok) {
        console.log(info);
        // Handle successful response
        myModal.show();
     
        //document.getElementById('organization_name').value = 
        
    } else {
        // Handle error response
        console.error('Error submitting form:', response.statusText);
    }

    }catch(error) {
        console.error('Error:', error);
    }

    // const myModal = new bootstrap.Modal(document.getElementById('editModal'));
    // myModal.show();;
}




const reloadTable = async () => {
    //C:\xampp\htdocs\kyanu_document_tracking\application\modules\create_organization\views\grid\load_organization  create_organization/grid/load_organization
    const response = await fetch('Create_organization/get_organization_info');
    const data = await response.text();
    document.getElementById("table").innerHTML = data;
  }

const el_table = document.getElementById("table");
if(el_table) {
    reloadTable();
}

const el_form_save = document.getElementById("form_save");
const el_modal_btn_save = document.getElementById("orgSave");




// Check if toast should be shown
const shouldShowToast = localStorage.getItem('showToast');
const shouldShowToastdel = localStorage.getItem('showToastdel');
if (shouldShowToast === 'true' || shouldShowToastdel === 'true') { //not done
    // Show the toast
    var el_toast = document.getElementById("liveToast");
    var myToast = new bootstrap.Toast(el_toast, {delay : 3000});
    myToast.show();

    // Remove the flag from localStorage to prevent showing the toast again
    localStorage.removeItem('showToast');
}







if(el_modal_btn_save) {

    el_modal_btn_save.addEventListener("click", async(e) => 
    {
        e.preventDefault();
    try 
    {
        let data = new FormData(el_form_save);
        const response = await fetch('create_organization/services/Create_organization_service/save', {
            method: 'POST',
            body: data
        });
        const info = await response.text();

        if (response.ok) {
            // Handle successful response
            console.log('Form submitted successfully');
            localStorage.setItem('showToast', 'true');
            window.location.href = "Organization";
            
          
            
        } else {
            // Handle error response
            console.error('Error submitting form:', response.statusText);
        }

    }catch(error) 
    {
        console.error('Error submitting form:', error);
    }

    });

};



 
// document.getElementById("submit").addEventListener("click", () => {

//     alert(document.getElementById("address").value);
// });


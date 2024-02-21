window.addEventListener("DOMContentLoaded", () => {

const el_modal_btn_save = document.getElementById("orgSave");
const el_modal_btn_delete = document.getElementById("orgDelete");

const el_form_save = document.getElementById("form_save");
const el_cancel = document.getElementById("cancel");
const el_add_new_org = document.getElementById("btn_add_new");

const el_table = document.getElementById("table");


const reloadTable = async () => {
    //C:\xampp\htdocs\kyanu_document_tracking\application\modules\create_organization\views\grid\load_organization  create_organization/grid/load_organization
    const response = await fetch('Create_organization/get_organization_info');
    const data = await response.text();
    document.getElementById("table").innerHTML = data;
  }

if(el_table) {
    reloadTable();
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
        console.log(response);

        if (response.ok) {
            // Handle successful response
            console.log('Form submitted successfully');
            window.location.href = "Dashboard";
            
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

if(el_cancel) {

    el_cancel.addEventListener("click", () => {
    window.location.href = "Dashboard";
    });
}

if(el_add_new_org) {

        el_add_new_org.addEventListener("click", () => { 
            window.location.href = "Add"; // route
        })
     
}

if(el_modal_btn_delete) {

    el_modal_btn_delete.addEventListener("click", async () => {

        let value = document.getElementById("deletebutton").getAttribute("data-pass-value");
        console.log(value);
        try 
    {
      let data = new FormData();
      data.append('id', value);
      const response = await fetch('create_organization/services/Create_organization_service/delete', {
          method: 'POST',
          body: data
      });
      const info = await response.text();
      console.log(response);
  
      if (response.ok) {
          // Handle successful response
          console.log('Form submitted successfully');

          const deleteModal = document.getElementById("deleteModal");
          const modal = bootstrap.Modal.getInstance(deleteModal);
          modal.hide();
          reloadTable();
          
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


});
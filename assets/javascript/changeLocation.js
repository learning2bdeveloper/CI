document.addEventListener("DOMContentLoaded", () => {

    const btn_org =  document.getElementById("btn_org");
    if(btn_org) {
        btn_org.addEventListener("click", () => {
            window.location.href = "Organization";
        });
    }

    const btn_dashboard =  document.getElementById("btn_dashboard");
    if(btn_dashboard) {
        btn_dashboard.addEventListener("click", () => {
            window.location.href = "Dashboard";
        });
    }

    const el_cancel = document.getElementById("cancel");
    if(el_cancel) {

        el_cancel.addEventListener("click", () => {
        window.location.href = "Organization";
        });
    }

    const el_add_new_org = document.getElementById("btn_add_new");
    if(el_add_new_org) {

            el_add_new_org.addEventListener("click", () => { 
                window.location.href = "Add"; // route
            })
        
    }
   
 
    
    
});
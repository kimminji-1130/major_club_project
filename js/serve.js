//체크박스 하나만선택

function checkOnlyOne(element) {
  
    const checkboxes 
        = document.getElementsByName("animal");
    
    checkboxes.forEach((cb) => {
      cb.checked = false;
    })
    
    element.checked = true;
  }
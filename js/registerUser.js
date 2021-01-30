function jsFunction1() {
    
    var select =  document.getElementById('type').value;
    var user= document.getElementById('user');
    var vendor= document.getElementById('vendor');

    if(select=='user'){
      vendor.style.display='none';
      user.style.display='block';
    }else if(select=='vendor'){
      user.style.display='none';
      vendor.style.display='block';
    }else{
      user.style.display='none';
      vendor.style.display='none';
    }
}


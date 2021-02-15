function displaySection(sectionId,checkbox){
    chk=document.getElementById(checkbox).checked;
    sec=document.getElementById(sectionId);
    if(chk){
        sec.style.display='block';
    }else{
        sec.style.display='none';
    }

}




var alreadyExists = false;
function adddetails(tableService,package,packprice,desc,id){
    var table = document.getElementById(tableService);
    var packageName  = document.getElementById(package).value;  
    var price  = document.getElementById(packprice).value; 
    var description  = document.getElementById(desc).value; 
    var packId = document.getElementById(id).value;
    
    

    if(packageName =='' || price == '' || description == '' ){
        alert('Insert valid Values');
    }else{
        if(alreadyExists){
            var currentId = document.getElementById(id).value;  
        }else{
            var currentId = 0;
        }
        if(packId != ''){
            var table = document.getElementById(tableService);
            for (var i = 1, row; row = table.rows[i]; i++) {
                if(row.cells[3].innerHTML==packId){
                    row.cells[0].innerHTML=packageName;
                    row.cells[1].innerHTML=price;
                    row.cells[2].innerHTML=description;
                    row.cells[3].innerHTML=packId;
                }
            
                  
            }
        }else{
            switch (tableService) {
                case 'tablePhoto':
                        var row=`<tr>
                            <td>${packageName}</td><input type="hidden" name="typeP[]" value="${packageName}">
                            <td>${price}</td><input type="hidden" name="priceP[]" value="${price}">
                            <td>${description}</td><input type="hidden" name="descriptionP[]" value="${description}">
                            <td style='display: none;'>${currentId}</td><input type="hidden" name="idP[]" value="${currentId}"></tr>`;
                            
                    break;
                case 'tableVideo':
                        var row=`<tr>
                        <td>${packageName}</td><input type="hidden" name="typeV[]" value="${packageName}">
                        <td>${price}</td><input type="hidden" name="priceV[]" value="${price}">
                        <td>${description}</td><input type="hidden" name="descriptionV[]" value="${description}">
                        <td style='display: none;'>${currentId}</td><input type="hidden" name="idV[]" value="${currentId}"></tr>`;
                            
                    break;
                case 'tableDecoration':
                        var row=`<tr>
                            <td><input type="hidden" name="typeP[]" value="${packageName}">${packageName}</td>
                            <td><input type="hidden" name="priceP[]" value="${price}">${price}</td>
                            <td><input type="hidden" name="descriptionP[]" value="${description}">${description}</td>
                            <td><input type="hidden" name="idP[]" value="${currentId}"></td></tr>`;
                            
                    break;
                case 'tableLocation':
                        var row=`<tr>
                            <td><input type="hidden" name="typeL[]" value="${packageName}">${packageName}</td>
                            <td><input type="hidden" name="priceL[]" value="${price}">${price}</td>
                            <td><input type="hidden" name="descriptionL[]" value="${description}">${description}</td>
                            <td><input type="hidden" name="idL[]" value="${currentId}"></td></tr>`;
                            
                    break;
            
                default:
                    break;
            }
          
        table.innerHTML+=row; 
        
        }
        document.getElementById(package).value = '';
        document.getElementById(packprice).value ='';
        document.getElementById(desc).value = ''; 
        document.getElementById(id).value = '';

        
        
        alreadyExists = false;
        console.log(alreadyExists);
    }   
}

function table(table,packagetitle,packagePrice,packageDescription,packageId){
    run();
    
    function run() {
        var t = document.getElementById(table);
        var rows = t.rows; 
        for (var i=0; i<rows.length; i++) {
            rows[i].onclick = function () {
                var cells = this.cells;
                var a = document.getElementById(packagetitle);
                var b = document.getElementById(packagePrice);
                var c = document.getElementById(packageDescription);
                var d = document.getElementById(packageId);
                a.value = cells[0].innerHTML;
                b.value = cells[1].innerHTML;
                c.value = cells[2].innerHTML;
                d.value = cells[3].innerHTML;
                alreadyExists = true;
        };
    }
}
}

function setNull(package,packprice,desc,id){
    console.log('clear');
    document.getElementById(package).value='';  
    document.getElementById(packprice).value=''; 
    document.getElementById(desc).value=''; 
    document.getElementById(id).value='';
}

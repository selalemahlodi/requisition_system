document.addEventListener('DOMContentLoaded', function() {
    const addRowLink = document.getElementById('addRowLink');
    const itemRowsContainer = document.getElementById('itemRowsContainer');
    const attachQuoteLink = document.getElementById('attachQuoteLink');
    const quoteFile = document.getElementById('quoteFile');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const totalAmountInput = document.getElementById('totalAmount');

    
    addRowLink.addEventListener('click', function(e) {
        e.preventDefault(); 

     
        const newRow = document.createElement('div');
        newRow.className = 'table-row';

       
        const descInput = document.createElement('input');
        descInput.type = 'text';
        descInput.name = 'description[]';
        descInput.className = 'input-desc';
        newRow.appendChild(descInput);

        const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.step = '0.01';
        amountInput.name = 'amount[]';
        amountInput.className = 'input-amount';
        newRow.appendChild(amountInput);

        
        itemRowsContainer.appendChild(newRow);
        
        
        amountInput.addEventListener('input', calculateTotal);
    });

    attachQuoteLink.addEventListener('click', function(e) {
        e.preventDefault(); 
        quoteFile.click(); 
    });
    
   
    quoteFile.addEventListener('change', function() {
        if (quoteFile.files.length > 0) {
            fileNameDisplay.textContent = 'Attached file: ' + quoteFile.files[0].name;
        } else {
            
            const initialFileName = quoteFile.getAttribute('data-initial-filename'); 
            if (initialFileName) {
                fileNameDisplay.textContent = 'Attached file: ' + initialFileName;
            } else {
                fileNameDisplay.textContent = '';
            }
        }
    });

    function calculateTotal() {
        let total = 0;

        const amountInputs = document.querySelectorAll('.input-amount');
        
        amountInputs.forEach(input => {
           
            const amount = parseFloat(input.value) || 0;
            total += amount;
        });

   
        totalAmountInput.value = total.toFixed(2);
    }
    
   
    document.querySelectorAll('.input-amount').forEach(input => {
        input.addEventListener('input', calculateTotal);
    });

   
    calculateTotal();

    if (quoteFile.files.length === 0 && fileNameDisplay.textContent.includes("Attached file:")) {
        const currentFileName = fileNameDisplay.textContent.replace('Attached file: ', '');
        quoteFile.setAttribute('data-initial-filename', currentFileName);
    }
});
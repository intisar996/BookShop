
/*********************This Code For Date =  Min  Date = tomorrow ******************* */
var today = new Date();
var tomorrow = new Date(today.getTime() + 86400000); // add one day in milliseconds
document.getElementById('date').setAttribute('min', tomorrow.toISOString().split('T')[0]);


/**************Make Space In Card Number 0000 0000 0000 0000 */
function formatCardNum() {
    var cardnumInput = document.getElementById("cardnum");
    var cardnumValue = cardnumInput.value;
  
    // Remove any non-digit characters
    cardnumValue = cardnumValue.replace(/\D/g, '');
  
    // Add space after every fourth digit
    cardnumValue = cardnumValue.replace(/(\d{4})(?=\d)/g, '$1 ');
  
    // Set the formatted value back into the input field
    cardnumInput.value = cardnumValue;
  
    // Check for all-zero input and prevent form submission
    if (/^0{16}$/.test(cardnumValue.replace(/\s/g, ''))) {
      cardnumInput.setCustomValidity('Card number cannot be all zeros');
    } else {
      cardnumInput.setCustomValidity('');
    }
  }

  /*************** Update Quantity For Cart************************ */


      // Update the total price


      function updateQty(cart_id, qty) {
        var qty_input = $('#qty' + cart_id);
        var availableQuantity = parseInt(qty_input.attr('max'));
          
        if (qty > availableQuantity) {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Sorry, only " + availableQuantity + " Book available in stock!",
            footer: "<a href=\"cart.php\"></a>"
          });
          qty = availableQuantity;
        }
          
        $.ajax({
          url: 'update_cart.php',
          method: 'POST',
          data: { rno: cart_id, qty: qty },
          success: function(response) {
            console.log(response);
            var price_td = qty_input.closest('tr').find('td:nth-child(4)');
            var subtotal_td = qty_input.closest('tr').find('td:nth-child(5)');
            var price = parseFloat(price_td.text());
            var subtotal = qty * price;
            subtotal_td.html(subtotal.toFixed(2) + ' OMR');
            qty_input.val(qty);
            
           
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
      }
      
      $('.qty-input').on('change', function() {
        // reload page after 2 seconds delay
        setTimeout(function() {
          location.reload();
        }, 500); // 2 seconds delay
      });


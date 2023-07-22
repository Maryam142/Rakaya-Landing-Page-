const validation = new JustValidate("#signupx");

validation
//Name Validation:
    .addField("#firstName", [
        {
            rule: "required"
          }        
    ])

    .addField("#lastName", [
        {
            rule: "required"
        }
    ])

// Email Validation:
    .addField("#email", [
        {rule: "required"}, {rule: "email"}

    ])

// Password Validation:
    .addField("#password", [
        {rule: "required"}, {rule: "strongPassword"}
    ])
// Password Confirmation Validation:
    .addField("#password2", [
        {
            validator: (value, fields) => {
                return value === fields["#password"].elem.value;  
          },
            errorMessage: "يجب ان تتطابق كلمات المرور"
        }
    ])
    // Usertype Validation:
    // .addField("#usertype", [
    //     {rule: "required"}
      
    // ])

// Phone Validation:
    function validateNumber(input) {
      var re = /^(\d{3})[- ]?(\d{3})[- ]?(\d{4})$/;

      return re.test(input)
    }

    function validateForm(event) {
      var number = document.getElementById('phone').value
      if (!validateNumber(number)) {
        const ele = document.getElementById('result')
        ele.innerHTML = 'يرجى ادخال رقم هاتف صحيح'
        ele.style.color = 'red'
       }
      event.preventDefault()
    }

    document.getElementById('signup').addEventListener('submit', validateForm);

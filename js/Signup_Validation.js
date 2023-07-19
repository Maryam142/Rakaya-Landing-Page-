const validation = new JustValidate("#signup");

validation
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

    .addField("#email", [
        {rule: "required"}, {rule: "email"}

    ])

    .addField("#password", [
        {rule: "required"}, {rule: "password"}
    ])
    // password confirmation
    .addField("#password2", [
        {
            validator: (value, fields) => {
                return value === fields["#password"].elem.value;  
          },
            errorMessage: "يجب ان تتطابق كلمات المرور"
        }
    ])

   
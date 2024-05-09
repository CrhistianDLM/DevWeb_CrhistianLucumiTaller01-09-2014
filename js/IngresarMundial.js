//crea la funcion para  validar campos vacios 
function validarIngreso(form, event){
  //event.preventDefault();
  //alert(form)
  let validations = {
    txtId: {
      required: true,
    },
    txtUsu: {
      required: true,
      email: true,
    },
    txtPro: {
      required: true,
    },
    txtMem: {
      required: true,
    },
    txtDis: {
      required: true,
    },
    txtTar: {
      required: true,
    },
    txtBoa: {
      required: true,
    },
    txtVal: {
      required: true,
    },
  };
  let invalidField = null;
  let isValid = -1 == (Object.keys(validations).findIndex(field => {
    let valid = approve.value(document.getElementById(field).value, validations[field]);
    valid.field = field;
    invalidField = valid;
    return !valid.approved;
  }));
  if(invalidField.errors.length > 0){
    alert("The field "+invalidField.field+" "+invalidField.errors.join(", "));
  }
  return isValid;
  return false;


}//fin de la funcion validarIngreso

	
//funcion para llamar proceso que genera reporte en excel
function generarExcel(){

   alert ("Generar Reporte Excel");	

}//fin de la funcion generarExcel


//funcion para llamar proceso que genera reporte en pdf
function generarPDF(){
	
  //llama  la funcion que muestra el reporte en pdf
  parent.location="../src/InfMundialPDF.php";
 
}//fin de la funcion generarPDF
function generarPDFs(){
	
  //llama  la funcion que muestra el reporte en pdf
  parent.location="../src/InfMundialPDF2.php";
 
}//fin de la funcion generarPDF





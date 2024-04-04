 // On every 'Change' of the radio buttons with the ID "roles" call the displayAreaTypes function
 document.getElementById("roles").addEventListener("change", displayAreaTypes);

 function displayAreaTypes() {
     // Get the value of radio buttun in step 1
     var rolesText = document.querySelector('.step-1 input[name="user-role"]:checked').value;

     var step2 = document.getElementById("areas");
     if (!step2.classList.contains('hide')) {
        step2.classList.add('hide');
    }

    var areaResultsCheckboxes = document.querySelectorAll('.step-2 input[type="checkbox"]');
    if (areaResultsCheckboxes && areaResultsCheckboxes.length > 0) {

        areaResultsCheckboxes.forEach(function(checkbox) {
            checkbox.checked = false;
        });
    }

    var step2Btn = document.getElementById("js-action-area");
    if (!step2Btn.classList.contains('hide')) {
        step2Btn.classList.add('hide');
    }

     var areaResults = document.querySelectorAll('.step-3 .area-results');
     if (areaResults && areaResults.length > 0) {

         areaResults.forEach(function(areaResult) {

             if (!areaResult.classList.contains('hide')) {
                 areaResult.classList.add('hide');
             }

         });
     }

     var appResultsBtn = document.getElementById("js-action-notes");
     if (!appResultsBtn.classList.contains('hide')) {
         appResultsBtn.classList.add('hide');
     }


     var step4 = document.getElementById("app-results");
     if (!step4.classList.contains('hide')) {
        step4.classList.add('hide');
    }


    
     step2.classList.remove('hide');
     step2.querySelectorAll(".wpcf7-list-item")[4].classList.remove('hide');

     if(rolesText === "Data Scientist"){
        step2.querySelectorAll(".wpcf7-list-item")[4].classList.add('hide');
     }
     
     scrollToTarget(step2, easeInOutCubic, 1000, 0);

 }

 var areaCheckboxes = document.querySelectorAll('#areas input[type=checkbox]');
 for (var checkbox of areaCheckboxes) {
     checkbox.addEventListener('change', function(event) {
         var numberCheckboxes = document.querySelectorAll('#areas input[type="checkbox"]:checked').length;
         document.getElementById("areas-results").classList.add('hide');
         document.getElementById("app-results").classList.add('hide');

         if (numberCheckboxes > 0) {
             document.getElementById("js-action-area").classList.remove('hide');
         } else {
             document.getElementById("js-action-area").classList.add('hide');
         }
     });
 }


 document.getElementById("js-action-area").addEventListener("click", displayResults);

 function displayResults() {

     var areaChecked = document.querySelectorAll('#areas input[type="checkbox"]:checked');
     var areaResults = document.querySelectorAll('.step-3 .area-results');
     var areaResultsCheckboxes = document.querySelectorAll('.step-3 input[type="checkbox"]');
     if (areaResults && areaResults.length > 0) {

         areaResults.forEach(function(areaResult) {

             if (!areaResult.classList.contains('hide')) {
                 areaResult.classList.add('hide');
             }

         });
     }

     if (areaResultsCheckboxes && areaResultsCheckboxes.length > 0) {

         areaResultsCheckboxes.forEach(function(checkbox) {
             checkbox.checked = false;
         });
     }

     var appResultsBtn = document.getElementById("js-action-notes");
     if (!appResultsBtn.classList.contains('hide')) {
         appResultsBtn.classList.add('hide');
     }

     var rolesText = document.querySelector('.step-1 input[name="user-role"]:checked').value;

     areaChecked.forEach(function(checkBtn) {

         var value = checkBtn.value;
       
        if(rolesText === "Data Scientist"){

            switch (value) {
                case "Data Quality":
                    var areaResults = document.querySelectorAll('.step-3 .data-quality');
                    if (areaResults && areaResults.length > 0) {
   
                        areaResults.forEach(function(areaResult) {
   
                            areaResult.classList.remove('hide');
   
                        });
                    }
                    break;
                case "Performance Monitoring":
                    var areaResults = document.querySelectorAll('.step-3 .performance-monitoring-2');
                    if (areaResults && areaResults.length > 0) {
   
                        areaResults.forEach(function(areaResult) {
   
                            areaResult.classList.remove('hide');
   
                        });
                    }
                    break;
                case "Quantifying Upgrades":
                    var areaResults = document.querySelectorAll('.step-3 .quantifying-upgrades-2');
                    if (areaResults && areaResults.length > 0) {
   
                        areaResults.forEach(function(areaResult) {
   
                            areaResult.classList.remove('hide');
   
                        });
                    }
                    break;
                case "Fleet Health":
                    var areaResults = document.querySelectorAll('.step-3 .fleet-health-2');
                    if (areaResults && areaResults.length > 0) {
   
                        areaResults.forEach(function(areaResult) {
   
                            areaResult.classList.remove('hide');
   
                        });
                    }
                    break;
                case "Component Temperature":
                    var areaResults = document.querySelectorAll('.step-3 .component-temperatures-2');
                    if (areaResults && areaResults.length > 0) {
   
                        areaResults.forEach(function(areaResult) {
   
                            areaResult.classList.remove('hide');
   
                        });
                    }
                    break;
                default:
            }

        }else if(rolesText === "Asset Manager"){

            switch (value) {
             case "Data Quality":
                 var areaResults = document.querySelectorAll('.step-3 .data-quality-3');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             case "Performance Monitoring":
                 var areaResults = document.querySelectorAll('.step-3 .performance-monitoring-3');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             case "Quantifying Upgrades":
                 var areaResults = document.querySelectorAll('.step-3 .quantifying-upgrades-3');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             case "Fleet Health":
                 var areaResults = document.querySelectorAll('.step-3 .fleet-health-3');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             case "Gearbox Health":
                 var areaResults = document.querySelectorAll('.step-3 .gearbox-health-3');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             case "Component Temperature":
                 var areaResults = document.querySelectorAll('.step-3 .component-temperatures-3');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             default:
         }

        }else{
         switch (value) {
             case "Data Quality":
                 var areaResults = document.querySelectorAll('.step-3 .data-quality');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             case "Performance Monitoring":
                 var areaResults = document.querySelectorAll('.step-3 .performance-monitoring');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             case "Quantifying Upgrades":
                 var areaResults = document.querySelectorAll('.step-3 .quantifying-upgrades');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             case "Fleet Health":
                 var areaResults = document.querySelectorAll('.step-3 .fleet-health');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             case "Gearbox Health":
                 var areaResults = document.querySelectorAll('.step-3 .gearbox-health');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             case "Component Temperature":
                 var areaResults = document.querySelectorAll('.step-3 .component-temperatures');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             default:
         }
        }

     });

     this.classList.add('hide');

     var step3 = document.getElementById("areas-results");
     step3.classList.remove('hide');
     scrollToTarget(step3, easeInOutCubic, 1000, 0);

 }

 var resultsCheckboxes = document.querySelectorAll('.step-3 input[type=checkbox]');
 for (var checkbox of resultsCheckboxes) {
     checkbox.addEventListener('change', function(event) {
         var numberCheckboxes = document.querySelectorAll('.step-3 input[type="checkbox"]:checked').length;
         document.getElementById("app-results").classList.add('hide');

         if (numberCheckboxes > 0) {
             document.getElementById("js-action-notes").classList.remove('hide');
         } else {
             document.getElementById("js-action-notes").classList.add('hide');
         }
     });
 }


 document.getElementById("js-action-notes").addEventListener("click", displayAppResults);

 function displayAppResults() {

     // Get the value of the selected drop down
     var areaChecked = document.querySelectorAll('#areas input[type="checkbox"]:checked');

     var appResults = document.querySelectorAll('.step-4 .app-result');
     if (appResults && appResults.length > 0) {

         appResults.forEach(function(appResult) {

             if (!appResult.classList.contains('hide')) {
                 appResult.classList.add('hide');
             }

         });
     }

     areaChecked.forEach(function(checkBtn) {

         var value = checkBtn.value;

         switch (value) {
             case "Data Quality":
                 var areaResults = document.querySelectorAll('.step-4 .data-quality');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             case "Performance Monitoring":
                 var areaResults = document.querySelectorAll('.step-4 .performance-monitoring');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             case "Quantifying Upgrades":
                 var areaResults = document.querySelectorAll('.step-4 .quantifying-upgrades');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             case "Fleet Health":
                 var areaResults = document.querySelectorAll('.step-4 .fleet-health');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             case "Gearbox Health":
                 var areaResults = document.querySelectorAll('.step-4 .gearbox-health');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             case "Component Temperature":
                 var areaResults = document.querySelectorAll('.step-4 .component-temperatures');
                 if (areaResults && areaResults.length > 0) {

                     areaResults.forEach(function(areaResult) {

                         areaResult.classList.remove('hide');

                     });
                 }
                 break;
             default:

         }

     });



     this.classList.add('hide');
     var step4 = document.getElementById("app-results");
     step4.classList.remove('hide');
     scrollToTarget(step4, easeInOutCubic, 1000, 0);

 }

 // event on mailsent
 var wpcf7Elm = document.querySelector('.wpcf7');

 wpcf7Elm.addEventListener('wpcf7mailsent', function(event) {

     document.getElementById("roles-wrap").classList.add('hide');
     document.getElementById("areas").classList.add('hide');
     document.getElementById("areas-results").classList.add('hide');

     var areaResults = document.querySelectorAll('.step-3 .area-results');

     if (areaResults && areaResults.length > 0) {

         areaResults.forEach(function(areaResult) {

             if (!areaResult.classList.contains('hide')) {
                 areaResult.classList.add('hide');
             }

         });
     }

     var appResults = document.querySelectorAll('.step-4 .app-result');
     if (appResults && appResults.length > 0) {

         appResults.forEach(function(appResult) {

             if (!appResult.classList.contains('hide')) {
                 appResult.classList.add('hide');
             }

         });
     }
     document.getElementById("app-results").classList.add('hide');

     var ctaLinks = document.querySelectorAll('.product-page__cta');
     if (ctaLinks && ctaLinks.length > 0) {

         ctaLinks.forEach(function(cta) {

             if (!cta.classList.contains('hide')) {
                 cta.classList.add('hide');
             }

         });
     }

     var allProductSection = document.getElementById("all-products");
     var thankYouMsgs = document.querySelectorAll('.contact-page');
     if (thankYouMsgs && thankYouMsgs.length > 0) {

         thankYouMsgs.forEach((msg, index) => {

             if (index == 0) {
                 scrollToTarget(msg, easeInOutCubic, 1000, -60);
             }

             msg.appendChild(allProductSection);
             allProductSection.classList.remove('hide');
         });
     }


 }, false);


 //  const easeInQuad = (t) => t * t;
 const easeInOutCubic = (t) => (t < 0.5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1);

 const scrollToTarget = function(target, timing, duration, distance) {
     const top = target.getBoundingClientRect().top + distance;
     const startPos = window.pageYOffset;
     const diff = top;

     let startTime = null;
     let requestId;

     const loop = function(currentTime) {
         if (!startTime) {
             startTime = currentTime;
         }

         // Elapsed time in miliseconds
         const time = currentTime - startTime;

         const percent = Math.min(time / duration, 1);
         window.scrollTo(0, startPos + diff * timing(percent));

         if (time < duration) {
             // Continue moving
             requestId = window.requestAnimationFrame(loop);
         } else {
             window.cancelAnimationFrame(requestId);
         }
     };
     requestId = window.requestAnimationFrame(loop);
 };
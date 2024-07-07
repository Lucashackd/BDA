import * as fb from "firebase/database"; // sera preciso usar fb antes de cada funcao
import { dbConnect } from "./connetToFB.js";

dbConnect()
  .then((db) => {
    const dbRef = fb.ref(db, "produtos/");
    const consulta = fb.query(dbRef, fb.orderByKey());
    fb.onValue(consulta, (data) => {
      let arrayData = Object.entries(data.val());
      let invert = Object.fromEntries(arrayData.reverse());
      console.log(invert);
    });
  })
  .catch((err) => console.log(err));

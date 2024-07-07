import * as fb from "firebase/database"; // sera preciso usar fb antes de cada funcao
import { dbConnect } from "./connetToFB.js";

dbConnect()
  .then((db) => {
    const dbRef = fb.ref(db, "/");
    const consulta = fb.query(dbRef);
    fb.onChildAdded(consulta, (data) => {
      console.log(data.val());
    });
  })
  .catch((err) => console.log(err));

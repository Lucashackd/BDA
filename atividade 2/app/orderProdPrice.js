import * as fb from "firebase/database"; // sera preciso usar fb antes de cada funcao
import { dbConnect } from "./connetToFB.js";

dbConnect()
  .then((db) => {
    const dbRef = fb.ref(db, "produtos/");
    const consulta = fb.query(dbRef, fb.orderByChild("preco"));
    const produtos = [];
    fb.onChildAdded(consulta, (snapshot) => {
      console.log(snapshot.val());
    });
  })
  .catch((err) => console.log(err));

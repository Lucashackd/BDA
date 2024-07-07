import * as fb from "firebase/database";
import { dbConnect } from "./connetToFB.js";

dbConnect()
  .then((db) => {
    fb.get(fb.child(fb.ref(db), "/"))
      .then((snapshot) => {
        if (snapshot.exists()) {
          console.log(snapshot.val());
        } else {
          console.log("Nenhum dado encontrado.");
        }
        process.exit();
      })
      .catch((error) => {
        console.error(error);
        process.exit();
      });
  })
  .catch((err) => console.log(err));

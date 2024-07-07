import * as fb from "firebase/database";
import { dbConnect } from "./connetToFB.js";

dbConnect()
  .then((db) => {
    const dbRef = fb.ref(db, "produtos");
    fb.onChildChanged(dbRef, (snapshot) => {
      console.log(snapshot.val());
      if (snapshot.key == "-MwSzyJMlNDToTGtPuhc") {
        fb.off(dbRef, "child_changed");
        console.log(
          "O nó -> -MwSzyJMlNDToTGtPuhc <- foi alterado.\nMonitoramento parado!"
        );
        process.exit(0);
      }
    });
  })
  .catch((err) => console.log(err));

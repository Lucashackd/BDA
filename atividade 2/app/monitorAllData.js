import * as fb from "firebase/database";
import { dbConnect } from "./connetToFB.js";

dbConnect()
  .then((db) => {
    fb.onValue(fb.ref(db, "produtos"), (snapshot) => {
      console.log(snapshot.val());
      process.exit(0);
    });
  })
  .catch((err) => console.log(err));

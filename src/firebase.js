import { initializeApp } from "firebase/app";
import { getAuth } from "firebase/auth";
import { getFirestore } from "firebase/firestore";
import { getStorage } from "firebase/storage";

const firebaseConfig = {
  apiKey: "AIzaSyDVdVeDq-zDY9RbrLnxmgkoAqc39Ak-O94",
  authDomain: "skysoft-systems.firebaseapp.com",
  projectId: "skysoft-systems",
  storageBucket: "skysoft-systems.firebasestorage.app",
  messagingSenderId: "367090258169",
  appId: "1:367090258169:web:9dbcae7760cb3c8f1fd228",
  measurementId: "G-27ZHW3FNC1"
};

export const app = initializeApp(firebaseConfig);
export const auth = getAuth(app);
export const db = getFirestore(app);
export const storage = getStorage(app);

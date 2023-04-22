import re
from nltk.util import ngrams, pad_sequence, everygrams
from nltk.tokenize import word_tokenize
from nltk.lm import MLE, WittenBellInterpolated
import numpy as np
import os


import uvicorn
from fastapi import FastAPI, File, UploadFile
from fastapi.middleware.cors import CORSMiddleware

app = FastAPI()

origins = [
    "http://localhost",
    "http://localhost:3000",
    "http://127.0.0.1:8000",
    "http://localhost:8000",
]
app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)




# Training data file
train_data_file = ""

# testing data file
test_data_file = ""

# set ngram number
n = 5

# generate ngrams

def setTrainingFile(filename):

    train_data_file = filename

    global training_data

    # read training data
    with open(train_data_file) as f:
        train_text = f.read().lower()

    # apply preprocessing (remove text inside square and curly brackets and rem punc)
    train_text = re.sub(r"\[.*\]|\{.*\}", "", train_text)
    train_text = re.sub(r'[^\w\s]', "", train_text)


    

    # pad the text and tokenize
    training_data = list(pad_sequence(word_tokenize(train_text), n,
                                  pad_left=True,
                                  left_pad_symbol="<s>"))

def detectPlag(filename):

    test_data_file = filename

    # test_text = file.read().lower()
    with open(test_data_file) as f:
        test_text = f.read().lower()

    test_text = re.sub(r"\[.*\]|\{.*\}", "", test_text)
    test_text = re.sub(r'[^\w\s]', "", test_text)

    testing_data = list(pad_sequence(word_tokenize(test_text), n,
                        pad_left=True,
                        left_pad_symbol="<s>"))
    print("Length of test data:", len(testing_data))

    ngrams = list(everygrams(training_data, max_len=n))
    print("Number of ngrams:", len(ngrams))

    # build ngram language models
    model = WittenBellInterpolated(n)
    model.fit([ngrams], vocabulary_text=training_data)
    print(model.vocab)



    ngrams_set = list(everygrams(test_data_file, max_len=n))
    print("Number of ngrams:", len(ngrams_set))

    # assign scores
    scores = []
    sum = 0
    for i, item in enumerate(testing_data[n-1:]):
        s = model.score(item, testing_data[i:i+n-1])
        scores.append(s)
        sum = sum + s

    scores_np = np.array(scores)
    sum = (sum/len(testing_data))*100
    print(float(f'{sum:.2f}'),"%")

    return sum

@app.post("/upload_training-file")
def upload(file: UploadFile = File(...)):
    try:
        contents = file.file.read()
        with open(file.filename, 'wb') as f:
            f.write(contents)
    except Exception:
        return {"message": "There was an error uploading the file"}
    finally:
        file.file.close()
    setTrainingFile(file.filename)

    return {"message": f"Successfully uploaded {file.filename}"}

@app.post("/upload_testing-file")
def upload(file: UploadFile = File(...)):
    try:
        contents = file.file.read()
        with open(file.filename, 'wb') as f:
            f.write(contents)
    except Exception:
        return {"message": "There was an error uploading the file"}
    finally:
        file.file.close()
    sum = detectPlag(file.filename)

    return {"message": f"Successfully uploaded {file.filename}","Similarity":float(f'{sum:.2f}')}
    


if __name__ =="__main__":
    uvicorn.run(app,host = 'localhost', port = 8082)

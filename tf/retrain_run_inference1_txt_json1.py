# -*- coding: utf-8 -*-

"""Inception v3 architecture 모델을 retraining한 모델을 이용해서 이미지에 대한 추론(inference)을 진행하는 예제"""

import numpy as np
import tensorflow as tf
import count_len4

#imagePath를 최근에 들어온 사진으로 경로 수정 완료!!
imagePath = count_len4.new_list[0]
modelFullPath = '/tmp/output_graph.pb'                                       # 읽어들일 graph 파일 경로
labelsFullPath = '/tmp/output_labels.txt'                                   # 읽어들일 labels 파일 경로


def create_graph():
    """저장된(saved) GraphDef 파일로부터 graph를 생성하고 saver를 반환한다."""
    # 저장된(saved) graph_def.pb로부터 graph를 생성한다.
    with tf.gfile.FastGFile(modelFullPath, 'rb') as f:
        graph_def = tf.GraphDef()
        graph_def.ParseFromString(f.read())
        _ = tf.import_graph_def(graph_def, name='')


def run_inference_on_image():
    answer = None

    if not tf.gfile.Exists(imagePath):
        tf.logging.fatal('File does not exist %s', imagePath)
        return answer

    image_data = tf.gfile.FastGFile(imagePath, 'rb').read()

    # 저장된(saved) GraphDef 파일로부터 graph를 생성한다.
    create_graph()

    with tf.Session() as sess:

        softmax_tensor = sess.graph.get_tensor_by_name('final_result:0')
        predictions = sess.run(softmax_tensor,
                               {'DecodeJpeg/contents:0': image_data})
        predictions = np.squeeze(predictions)

        top_k = predictions.argsort()[-5:][::-1]  # 가장 높은 확률을 가진 5개(top 5)의 예측값(predictions)을 얻는다.

        #9/23 HE - 46
        f = open(labelsFullPath, 'r')
        lines = f.readlines()
        lines = list(map(lambda s: s.strip(), lines))
        labels = [str(w).replace("", "") for w in lines]

        # 9/23 HE - 51
        f = open("/tmp/result_txt/test1.json" ,'w')
        f.write("[")

        for node_id in top_k:
            human_string = labels[node_id]
            score = predictions[node_id]
            print('%s (score = %.5f)' % (human_string, score))

            data = "{\"model\" : \"%s\", \"accuracy\" : \"%.5f\"}" % (human_string, score)
            f.write(data)
        f.write("]")
        f.close()

        answer = labels[top_k[0]]
        return answer


if __name__ == '__main__':
    run_inference_on_image()

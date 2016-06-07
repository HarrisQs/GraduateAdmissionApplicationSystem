//#include "stdafx.h"  

#include "opencv2/imgproc/imgproc.hpp"  
#include "opencv2/highgui/highgui.hpp"  
#include <stdlib.h>  
#include <stdio.h>  

using namespace cv;

/// 全局变量  
Mat src, erosion_dst, dilation_dst, opening_dst;

int erosion_elem = 0;
int erosion_size = 0;
int dilation_elem = 0;
int dilation_size = 0;
int opening_elem = 0;
int opening_size = 6;
int const max_elem = 2;
int const max_kernel_size = 100;

/** Function Headers */
void Erosion(int, void*);
void Dilation(int, void*);
void Opening(int, void*);
/** @function main */
int main(int argc, char** argv)
{
	/// Load 图像  
	IplImage *Image;
	src = imread("IMG_5703.JPG",0);
	//IMG_5702.JPG 24  size = 72  elem = 2;
	//IMG_5703.JPG 31
	//IMG_5704.JPG
	cv::threshold(src, src, 127	, 255, cv::THRESH_BINARY);
	if (!src.data)
	{
		return -1;
	}

	/// 创建显示窗口  
	namedWindow("Erosion Demo", CV_WINDOW_AUTOSIZE);
	namedWindow("Dilation Demo", CV_WINDOW_AUTOSIZE);
	namedWindow("Opening Demo", CV_WINDOW_AUTOSIZE);
	namedWindow("Original Demo", CV_WINDOW_AUTOSIZE);
	imshow("Original Demo", src);
	cvMoveWindow("Dilation Demo", src.cols, 0);

	/// 创建腐蚀 Trackbar  
	createTrackbar("Element:\n 0: Rect \n 1: Cross \n 2: Ellipse", "Erosion Demo",
		&erosion_elem, max_elem,
		Erosion);

	createTrackbar("Kernel size:\n 2n +1", "Erosion Demo",
		&erosion_size, max_kernel_size,
		Erosion);

	/// 创建膨胀 Trackbar  
	createTrackbar("Element:\n 0: Rect \n 1: Cross \n 2: Ellipse", "Dilation Demo",
		&dilation_elem, max_elem,
		Dilation);

	createTrackbar("Kernel size:\n 2n +1", "Dilation Demo",
		&dilation_size, max_kernel_size,
		Dilation);

	//Opening
	createTrackbar("Element:\n 0: Rect \n 1: Cross \n 2: Ellipse", "Opening Demo",
		&opening_elem, max_elem,
		Opening);

	createTrackbar("Kernel size:\n 2n +1", "Opening Demo",
		&opening_size, max_kernel_size,
		Opening);

	/// Default start  
	Erosion(0, 0);
	Dilation(0, 0);
	Opening(0, 0);
	waitKey(0);
	return 0;
}

/**  @function Erosion  */
void Erosion(int, void*)
{
	int erosion_type;
	if (erosion_elem == 0){ erosion_type = MORPH_RECT; }
	else if (erosion_elem == 1){ erosion_type = MORPH_CROSS; }
	else if (erosion_elem == 2) { erosion_type = MORPH_ELLIPSE; }

	Mat element = getStructuringElement(erosion_type,
		Size(2 * erosion_size + 1, 2 * erosion_size + 1),
		Point(erosion_size, erosion_size));

	/// 腐蚀操作  
	erode(src, erosion_dst, element);
	imshow("Erosion Demo", erosion_dst);
}

/** @function Dilation */
void Dilation(int, void*)
{
	int dilation_type;
	if (dilation_elem == 0){ dilation_type = MORPH_RECT; }
	else if (dilation_elem == 1){ dilation_type = MORPH_CROSS; }
	else if (dilation_elem == 2) { dilation_type = MORPH_ELLIPSE; }

	Mat element = getStructuringElement(dilation_type,
		Size(2 * dilation_size + 1, 2 * dilation_size + 1),
		Point(dilation_size, dilation_size));
	///膨胀操作  
	dilate(src, dilation_dst, element);
	imshow("Dilation Demo", dilation_dst);
}
void Opening(int, void*)
{
	int opening_type;
	if (opening_elem == 0){ opening_type = MORPH_RECT; }
	else if (opening_elem == 1){ opening_type = MORPH_CROSS; }
	else if (opening_elem == 2) { opening_type = MORPH_ELLIPSE; }

	Mat element = getStructuringElement(opening_type,
		Size(opening_size+1, opening_size+1),//2 * opening_size + 1, 2 * opening_size + 1
		Point(opening_size, opening_size));
	///膨胀操作 
	/*dilate(src, opening_dst, element);
	erode(src, opening_dst, element);*/
	cv::morphologyEx(src, opening_dst, cv::MORPH_CLOSE, element);
	imshow("Opening Demo", opening_dst);
}
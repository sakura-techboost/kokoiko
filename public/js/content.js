/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/content.js":
/*!*********************************!*\
  !*** ./resources/js/content.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$(function () {\n  //header.blade.php内のエリアから検索部分のポップオーバー\n  $('[data-toggle=\"popover\"]').popover(); //新規登録フォーム(createContent.blade.php)内のモーダルで入力した値の貼り付け\n  //住所登録\n\n  $('#address-form').submit(function () {\n    var textCode = $('#form_postalcode').val();\n    var textCode2 = $('#form_postalcode2').val();\n    var selectPref = $('#form_pref option:selected').text();\n    var prefValue = $('#form_pref option:selected').val();\n    var textAddress = $('#form_address').val(); //入力された内容をフォームに追加\n    //表示テキスト\n\n    $('.address .postalcode').text(textCode + textCode2);\n    $('.address .pref').text(selectPref);\n    $('.address .address').text(textAddress); //データの付与\n\n    $('.address #postalcode').val(textCode + textCode2);\n    $('.address option').text(selectPref);\n    $('.address option').val(prefValue);\n    $('.address #address').val(textAddress); //モーダルを閉じる\n\n    $('#addAddress').modal('hide'); //画面全体のリロードを止める\n\n    return false;\n  }); //電話番号登録\n\n  $('#phone-form').submit(function () {\n    var textPhone = $('#form_phone').val(); //入力された内容をフォームに追加\n    //表示テキスト\n\n    $('.phone span').text(textPhone); //データの付与\n\n    $('.phone input').attr('value', textPhone); //モーダルを閉じる\n\n    $('#addPhone').modal('hide');\n    return false;\n  }); //カテゴリー登録\n\n  $('#category-form').submit(function () {\n    var selectCategory = $('#form_category_id option:selected').text();\n    var CategoryValue = $('#form_category_id option:selected').val(); //入力された内容をフォームに追加\n    //表示テキスト\n\n    $('.category span').text(selectCategory); //データの付与\n\n    $('.category option').val(CategoryValue);\n    $('.category option').text(selectCategory); //モーダルを閉じる\n\n    $('#addCategories').modal('hide'); //画面全体のリロードを止める\n\n    return false;\n  }); //電話番号登録\n\n  $('#url-form').submit(function () {\n    var textUrl = $('#form_url').val(); //入力された内容をフォームに追加\n    //表示テキスト\n\n    $('.url span').text(textUrl); //データの付与\n\n    $('.url input').attr('value', textUrl); //モーダルを閉じる\n\n    $('#addUrl').modal('hide');\n    return false;\n  }); //画像のプレビューを表示と非表示\n\n  $(\"#filesend\").change(function () {\n    //input type=\"file\"の値が変わったら発火\n    var file_count = $(\"#filesend\")[0].files.length; //画像の数を取得\n\n    var file = $(\"#filesend\")[0].files; //すべての画像の情報を取得\n\n    var imageList = \"\";\n\n    if (file_count > 4) {\n      alert('登録できる画像は4つまでです');\n      return false;\n    }\n\n    if (file_count > 0) {\n      //ファイル数が1つ以上であればプレビューボックスを表示\n      $('.preview-box').removeClass('d-none'); //もしedit.blade.phpにてあらかじめ表示されているプレビューボックスがあったら非表示にする\n\n      if ($('.edit-preview-box').length) {\n        $('.edit-preview-box').remove();\n      } //$('.reset').removeClass('d-none');\n      //ファイルの数だけ処理を行う\n\n\n      for (var i = 0; i < file_count; i++) {\n        var filereader = new FileReader(); //ファイルにインデックス番号を付ける\n\n        var file_info = file[i]; //ファイルがロードされたら発火\n\n        filereader.onload = function (event) {\n          //画像を表示するHTMLを作成\n          imageList = \"\".concat(imageList, \"<div class=\\\"preview col-3\\\"><img class=\\\"card-img img-thumbnail rounded d-block\\\" id=\\\"preview\\\" src=\\\"\").concat(event.target.result, \"\\\"></div>\");\n          $(\".preview-box\").html(imageList);\n        }; //filereaderを先に読み込む\n\n\n        filereader.readAsDataURL(file_info); //readAsDateURLメソッドでファイルを読み込む、他にあるので好きなのでいい\n      }\n    } else {\n      $(\".preview-box\").html(\"\");\n      $('.preview-box').addClass('d-none');\n    }\n  }); //記事詳細画面(show.blade.php)\n  //カルーセル内のアイコンの色を変える\n\n  $(function () {\n    var iconColor = \"#000\";\n    $('.carousel-control-prev-icon').css(\"background-image\", \"url(\\\"data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='\".concat(encodeURIComponent(iconColor), \"' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E\\\")\"));\n    $(\".carousel-control-next-icon\").css(\"background-image\", \"url(\\\"data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='\".concat(encodeURIComponent(iconColor), \"' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E\\\")\"));\n  }); //プロフィール編集画面(mypage.blade.php)\n  //名前変更\n\n  $('#name-form').submit(function () {\n    var editedName = $('#form_name').val(); //入力された内容をフォームに追加\n    //データの送信\n\n    if (editedName != '') {\n      //フォーム内が空でなければデータを上書き\n      $('#name').attr('value', editedName); //モーダルを閉じる\n\n      $('#edit-name').modal('hide');\n      return false;\n    } else {\n      //モーダルを閉じる\n      $('#edit-name').modal('hide');\n      return false;\n    }\n  }); //カナ変更\n\n  $('#kana-form').submit(function () {\n    var editedKana = $('#form_kana').val(); //入力された内容をフォームに追加\n    //データの送信\n\n    if (editedKana != '') {\n      //フォーム内が空でなければデータを上書き\n      $('#kana').attr('value', editedKana); //モーダルを閉じる\n\n      $('#edit-kana').modal('hide');\n      return false;\n    } else {\n      //モーダルを閉じる\n      $('#edit-kana').modal('hide');\n      return false;\n    }\n  }); //ニックネーム変更\n\n  $('#nickname-form').submit(function () {\n    var editedNickname = $('#form_nickname').val(); //入力された内容をフォームに追加\n    //データの送信\n\n    if (editedNickname != '') {\n      //フォーム内が空でなければデータを上書き\n      $('#nickname').attr('value', editedNickname); //モーダルを閉じる\n\n      $('#edit-nickname').modal('hide');\n      return false;\n    } else {\n      //モーダルを閉じる\n      $('#edit-nickname').modal('hide');\n      return false;\n    }\n  }); //メールアドレス変更\n\n  $('#email-form').submit(function () {\n    var editedEmail = $('#form_email').val(); //入力された内容をフォームに追加\n    //データの送信\n\n    if (editedEmail != '') {\n      //フォーム内が空でなければデータを上書き\n      $('#email').attr('value', editedEmail); //モーダルを閉じる\n\n      $('#edit-email').modal('hide');\n      return false;\n    } else {\n      //モーダルを閉じる\n      $('#edit-email').modal('hide');\n      return false;\n    }\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvY29udGVudC5qcz9lMzY1Il0sIm5hbWVzIjpbIiQiLCJwb3BvdmVyIiwic3VibWl0IiwidGV4dENvZGUiLCJ2YWwiLCJ0ZXh0Q29kZTIiLCJzZWxlY3RQcmVmIiwidGV4dCIsInByZWZWYWx1ZSIsInRleHRBZGRyZXNzIiwibW9kYWwiLCJ0ZXh0UGhvbmUiLCJhdHRyIiwic2VsZWN0Q2F0ZWdvcnkiLCJDYXRlZ29yeVZhbHVlIiwidGV4dFVybCIsImNoYW5nZSIsImZpbGVfY291bnQiLCJmaWxlcyIsImxlbmd0aCIsImZpbGUiLCJpbWFnZUxpc3QiLCJhbGVydCIsInJlbW92ZUNsYXNzIiwicmVtb3ZlIiwiaSIsImZpbGVyZWFkZXIiLCJGaWxlUmVhZGVyIiwiZmlsZV9pbmZvIiwib25sb2FkIiwiZXZlbnQiLCJ0YXJnZXQiLCJyZXN1bHQiLCJodG1sIiwicmVhZEFzRGF0YVVSTCIsImFkZENsYXNzIiwiaWNvbkNvbG9yIiwiY3NzIiwiZW5jb2RlVVJJQ29tcG9uZW50IiwiZWRpdGVkTmFtZSIsImVkaXRlZEthbmEiLCJlZGl0ZWROaWNrbmFtZSIsImVkaXRlZEVtYWlsIl0sIm1hcHBpbmdzIjoiQUFBQUEsQ0FBQyxDQUFDLFlBQVk7QUFDWjtBQUNBQSxHQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QkMsT0FBN0IsR0FGWSxDQUlaO0FBQ0E7O0FBQ0FELEdBQUMsQ0FBQyxlQUFELENBQUQsQ0FBbUJFLE1BQW5CLENBQTBCLFlBQVU7QUFDbEMsUUFBSUMsUUFBUSxHQUFDSCxDQUFDLENBQUMsa0JBQUQsQ0FBRCxDQUFzQkksR0FBdEIsRUFBYjtBQUNBLFFBQUlDLFNBQVMsR0FBQ0wsQ0FBQyxDQUFDLG1CQUFELENBQUQsQ0FBdUJJLEdBQXZCLEVBQWQ7QUFDQSxRQUFJRSxVQUFVLEdBQUNOLENBQUMsQ0FBQyw0QkFBRCxDQUFELENBQWdDTyxJQUFoQyxFQUFmO0FBQ0EsUUFBSUMsU0FBUyxHQUFDUixDQUFDLENB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QUNEO0FBQ0YsR0FmRCxFQTdKWSxDQTZLWjs7QUFDQVYsR0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQkUsTUFBakIsQ0FBd0IsWUFBVTtBQUNoQyxRQUFJd0MsV0FBVyxHQUFDMUMsQ0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQkksR0FBakIsRUFBaEIsQ0FEZ0MsQ0FFaEM7QUFDQTs7QUFDQSxRQUFHc0MsV0FBVyxJQUFFLEVBQWhCLEVBQW1CO0FBQ2pCO0FBQ0ExQyxPQUFDLENBQUMsUUFBRCxDQUFELENBQVlZLElBQVosQ0FBaUIsT0FBakIsRUFBeUI4QixXQUF6QixFQUZpQixDQUdqQjs7QUFDQTFDLE9BQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJVLEtBQWpCLENBQXVCLE1BQXZCO0FBQ0EsYUFBTyxLQUFQO0FBQ0QsS0FORCxNQU1LO0FBQ0g7QUFDQVYsT0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQlUsS0FBakIsQ0FBdUIsTUFBdkI7QUFDQSxhQUFPLEtBQVA7QUFDRDtBQUNGLEdBZkQ7QUFnQkQsQ0E5TEEsQ0FBRCIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9jb250ZW50LmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiJChmdW5jdGlvbiAoKSB7XG4gIC8vaGVhZGVyLmJsYWRlLnBocOWGheOBruOCqOODquOCouOBi+OCieaknOe0oumDqOWIhuOBruODneODg+ODl+OCquODvOODkOODvFxuICAkKCdbZGF0YS10b2dnbGU9XCJwb3BvdmVyXCJdJykucG9wb3ZlcigpXG4gIFxuICAvL+aWsOimj+eZu+mMsuODleOCqeODvOODoChjcmVhdGVDb250ZW50LmJsYWRlLnBocCnlhoXjga7jg6Ljg7zjg4Djg6vjgaflhaXlipvjgZfjgZ/lgKTjga7osrzjgorku5jjgZFcbiAgLy/kvY/miYDnmbvpjLJcbiAgJCgnI2FkZHJlc3MtZm9ybScpLnN1Ym1pdChmdW5jdGlvbigpe1xuICAgIHZhciB0ZXh0Q29kZT0kKCcjZm9ybV9wb3N0YWxjb2RlJykudmFsKCk7XG4gICAgdmFyIHRleHRDb2RlMj0kKCcjZm9ybV9wb3N0YWxjb2RlMicpLnZhbCgpO1xuICAgIHZhciBzZWxlY3RQcmVmPSQoJyNmb3JtX3ByZWYgb3B0aW9uOnNlbGVjdGVkJykudGV4dCgpO1xuICAgIHZhciBwcmVmVmFsdWU9JCgnI2Zvcm1fcHJlZiBvcHRpb246c2VsZWN0ZWQnKS52YWwoKTtcbiAgICB2YXIgdGV4dEFkZHJlc3M9JCgnI2Zvcm1fYWRkcmVzcycpLnZhbCgpO1xuICAgIC8v5YWl5Yqb44GV44KM44Gf5YaF5a6544KS44OV44Kp44O844Og44Gr6L+95YqgXG4gICAgLy/ooajnpLrjg4bjgq3jgrnjg4hcbiAgICAkKCcuYWRkcmVzcyAucG9zdGFsY29kZScpLnRleHQodGV4dENvZGUgKyB0ZXh0Q29kZTIpO1xuICAgICQoJy5hZGRyZXNzIC5wcmVmJykudGV4dChzZWxlY3RQcmVmKTtcbiAgICAkKCcuYWRkcmVzcyAuYWRkcmVzcycpLnRleHQodGV4dEFkZHJlc3MpO1xuICAgIC8v44OH44O844K/44Gu5LuY5LiOXG4gICAgJCgnLmFkZHJlc3MgI3Bvc3RhbGNvZGUnKS52YWwodGV4dENvZGUgKyB0ZXh0Q29kZTIpO1xuICAgICQoJy5hZGRyZXNzIG9wdGlvbicpLnRleHQoc2VsZWN0UHJlZik7XG4gICAgJCgnLmFkZHJlc3Mgb3B0aW9uJykudmFsKHByZWZWYWx1ZSk7XG4gICAgJCgnLmFkZHJlc3MgI2FkZHJlc3MnKS52YWwodGV4dEFkZHJlc3MpO1xuICAgIC8v44Oi44O844OA44Or44KS6ZaJ44GY44KLXG4gICAgJCgnI2FkZEFkZHJlc3MnKS5tb2RhbCgnaGlkZScpO1xuICAgIC8v55S76Z2i5YWo5L2T44Gu44Oq44Ot44O844OJ44KS5q2i44KB44KLXG4gICAgcmV0dXJuIGZhbHNlO1xuICB9KTtcbiAgXG4gIC8v6Zu76Kmx55Wq5Y+355m76YyyXG4gICQoJyNwaG9uZS1mb3JtJykuc3VibWl0KGZ1bmN0aW9uKCl7XG4gICAgdmFyIHRleHRQaG9uZT0kKCcjZm9ybV9waG9uZScpLnZhbCgpO1xuICAgIC8v5YWl5Yqb44GV44KM44Gf5YaF5a6544KS44OV44Kp44O844Og44Gr6L+95YqgXG4gICAgLy/ooajnpLrjg4bjgq3jgrnjg4hcbiAgICAkKCcucGhvbmUgc3BhbicpLnRleHQodGV4dFBob25lKTtcbiAgICAvL+ODh+ODvOOCv+OBruS7mOS4jlxuICAgICQoJy5waG9uZSBpbnB1dCcpLmF0dHIoJ3ZhbHVlJyx0ZXh0UGhvbmUpO1xuICAgIC8v44Oi44O844OA44Or44KS6ZaJ44GY44KLXG4gICAgJCgnI2FkZFBob25lJykubW9kYWwoJ2hpZGUnKTtcbiAgICByZXR1cm4gZmFsc2U7XG4gIH0pO1xuICBcbiAgLy/jgqvjg4bjgrTjg6rjg7znmbvpjLJcbiAgJCgnI2NhdGVnb3J5LWZvcm0nKS5zdWJtaXQoZnVuY3Rpb24oKXtcbiAgICB2YXIgc2VsZWN0Q2F0ZWdvcnk9JCgnI2Zvcm1fY2F0ZWdvcnlfaWQgb3B0aW9uOnNlbGVjdGVkJykudGV4dCgpO1xuICAgIHZhciBDYXRlZ29yeVZhbHVlPSQoJyNmb3JtX2NhdGVnb3J5X2lkIG9wdGlvbjpzZWxlY3RlZCcpLnZhbCgpO1xuICAgIC8v5YWl5Yqb44GV44KM44Gf5YaF5a6544KS44OV44Kp44O844Og44Gr6L+95YqgXG4gICAgLy/ooajnpLrjg4bjgq3jgrnjg4hcbiAgICAkKCcuY2F0ZWdvcnkgc3BhbicpLnRleHQoc2VsZWN0Q2F0ZWdvcnkpO1xuICAgIC8v44OH44O844K/44Gu5LuY5LiOXG4gICAgJCgnLmNhdGVnb3J5IG9wdGlvbicpLnZhbChDYXRlZ29yeVZhbHVlKTtcbiAgICAkKCcuY2F0ZWdvcnkgb3B0aW9uJykudGV4dChzZWxlY3RDYXRlZ29yeSk7XG4gICAgLy/jg6Ljg7zjg4Djg6vjgpLplonjgZjjgotcbiAgICAkKCcjYWRkQ2F0ZWdvcmllcycpLm1vZGFsKCdoaWRlJyk7XG4gICAgLy/nlLvpnaLlhajkvZPjga7jg6rjg63jg7zjg4njgpLmraLjgoHjgotcbiAgICByZXR1cm4gZmFsc2U7XG4gIH0pO1xuICBcbiAgLy/pm7voqbHnlarlj7fnmbvpjLJcbiAgJCgnI3VybC1mb3JtJykuc3VibWl0KGZ1bmN0aW9uKCl7XG4gICAgdmFyIHRleHRVcmw9JCgnI2Zvcm1fdXJsJykudmFsKCk7XG4gICAgLy/lhaXlipvjgZXjgozjgZ/lhoXlrrnjgpLjg5Xjgqnjg7zjg6Djgavov73liqBcbiAgICAvL+ihqOekuuODhuOCreOCueODiFxuICAgICQoJy51cmwgc3BhbicpLnRleHQodGV4dFVybCk7XG4gICAgLy/jg4fjg7zjgr/jga7ku5jkuI5cbiAgICAkKCcudXJsIGlucHV0JykuYXR0cigndmFsdWUnLHRleHRVcmwpO1xuICAgIC8v44Oi44O844OA44Or44KS6ZaJ44GY44KLXG4gICAgJCgnI2FkZFVybCcpLm1vZGFsKCdoaWRlJyk7XG4gICAgcmV0dXJuIGZhbHNlO1xuICB9KTtcblxuICAvL+eUu+WDj+OBruODl+ODrOODk+ODpeODvOOCkuihqOekuuOBqOmdnuihqOekulxuICAkKFwiI2ZpbGVzZW5kXCIpLmNoYW5nZShmdW5jdGlvbigpe1xuICAgIC8vaW5wdXQgdHlwZT1cImZpbGVcIuOBruWApOOBjOWkieOCj+OBo+OBn+OCieeZuueBq1xuICAgIHZhciBmaWxlX2NvdW50ID0gJChcIiNmaWxlc2VuZFwiKVswXS5maWxlcy5sZW5ndGg7Ly/nlLvlg4/jga7mlbDjgpLlj5blvpdcbiAgICB2YXIgZmlsZSA9ICQoXCIjZmlsZXNlbmRcIilbMF0uZmlsZXM7Ly/jgZnjgbnjgabjga7nlLvlg4/jga7mg4XloLHjgpLlj5blvpdcbiAgICB2YXIgaW1hZ2VMaXN0ID1cIlwiO1xuICAgIGlmIChmaWxlX2NvdW50ID4gNCApIHtcbiAgICAgICAgYWxlcnQoJ+eZu+mMsuOBp+OBjeOCi+eUu+WDj+OBrzTjgaTjgb7jgafjgafjgZknKTtcbiAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgIH1cbiAgICBpZihmaWxlX2NvdW50ID4gMCl7XG4gICAgICAvL+ODleOCoeOCpOODq+aVsOOBjDHjgaTku6XkuIrjgafjgYLjgozjgbDjg5fjg6zjg5Pjg6Xjg7zjg5zjg4Pjgq/jgrnjgpLooajnpLpcbiAgICAgICQoJy5wcmV2aWV3LWJveCcpLnJlbW92ZUNsYXNzKCdkLW5vbmUnKTtcbiAgICAgIC8v44KC44GXZWRpdC5ibGFkZS5waHDjgavjgabjgYLjgonjgYvjgZjjgoHooajnpLrjgZXjgozjgabjgYTjgovjg5fjg6zjg5Pjg6Xjg7zjg5zjg4Pjgq/jgrnjgYzjgYLjgaPjgZ/jgonpnZ7ooajnpLrjgavjgZnjgotcbiAgICAgIGlmKCQoJy5lZGl0LXByZXZpZXctYm94JykubGVuZ3RoKXtcbiAgICAgICAgJCgnLmVkaXQtcHJldmlldy1ib3gnKS5yZW1vdmUoKTtcbiAgICAgIH1cbiAgICAgIFxuICAgICAgLy8kKCcucmVzZXQnKS5yZW1vdmVDbGFzcygnZC1ub25lJyk7XG4gICAgICAvL+ODleOCoeOCpOODq+OBruaVsOOBoOOBkeWHpueQhuOCkuihjOOBhlxuICAgICAgZm9yKHZhciBpID0gMDsgaSA8IGZpbGVfY291bnQ7IGkrKyl7XG4gICAgICAgIHZhciBmaWxlcmVhZGVyID0gbmV3IEZpbGVSZWFkZXIoKTtcbiAgICAgICAgLy/jg5XjgqHjgqTjg6vjgavjgqTjg7Pjg4fjg4Pjgq/jgrnnlarlj7fjgpLku5jjgZHjgotcbiAgICAgICAgdmFyIGZpbGVfaW5mbyA9IGZpbGVbaV07XG4gICAgICAgIC8v44OV44Kh44Kk44Or44GM44Ot44O844OJ44GV44KM44Gf44KJ55m654GrXG4gICAgICAgIGZpbGVyZWFkZXIub25sb2FkID0gZnVuY3Rpb24oZXZlbnQpe1xuICAgICAgICAgIC8v55S75YOP44KS6KGo56S644GZ44KLSFRNTOOCkuS9nOaIkFxuICAgICAgICAgIGltYWdlTGlzdCA9IGAke2ltYWdlTGlzdH08ZGl2IGNsYXNzPVwicHJldmlldyBjb2wtM1wiPjxpbWcgY2xhc3M9XCJjYXJkLWltZyBpbWctdGh1bWJuYWlsIHJvdW5kZWQgZC1ibG9ja1wiIGlkPVwicHJldmlld1wiIHNyYz1cIiR7ZXZlbnQudGFyZ2V0LnJlc3VsdH1cIj48L2Rpdj5gO1xuICAgICAgICAgICQoXCIucHJldmlldy1ib3hcIikuaHRtbChpbWFnZUxpc3QpO1xuICAgICAgICB9XG4gICAgICAgIC8vZmlsZXJlYWRlcuOCkuWFiOOBq+iqreOBv+i+vOOCgFxuICAgICAgICBmaWxlcmVhZGVyLnJlYWRBc0RhdGFVUkwoZmlsZV9pbmZvKTsvL3JlYWRBc0RhdGVVUkzjg6Hjgr3jg4Pjg4njgafjg5XjgqHjgqTjg6vjgpLoqq3jgb/ovrzjgoDjgIHku5bjgavjgYLjgovjga7jgaflpb3jgY3jgarjga7jgafjgYTjgYRcbiAgICAgIH1cbiAgICB9ZWxzZXtcbiAgICAgICAgJChcIi5wcmV2aWV3LWJveFwiKS5odG1sKFwiXCIpO1xuICAgICAgICAkKCcucHJldmlldy1ib3gnKS5hZGRDbGFzcygnZC1ub25lJyk7XG4gICAgfVxuICB9KTtcbiAgXG5cbiAgLy/oqJjkuovoqbPntLDnlLvpnaIoc2hvdy5ibGFkZS5waHApXG5cbiAgLy/jgqvjg6vjg7zjgrvjg6vlhoXjga7jgqLjgqTjgrPjg7Pjga7oibLjgpLlpInjgYjjgotcbiAgJChmdW5jdGlvbiAoKSB7XG4gICAgY29uc3QgaWNvbkNvbG9yID0gXCIjMDAwXCI7XG4gIFxuICAgICQoJy5jYXJvdXNlbC1jb250cm9sLXByZXYtaWNvbicpLmNzcyhcImJhY2tncm91bmQtaW1hZ2VcIiwgYHVybChcImRhdGE6aW1hZ2Uvc3ZnK3htbDtjaGFyc2V0PXV0ZjgsJTNDc3ZnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZycgZmlsbD0nJHtlbmNvZGVVUklDb21wb25lbnQoaWNvbkNvbG9yKX0nIHZpZXdCb3g9JzAgMCA4IDgnJTNFJTNDcGF0aCBkPSdNNS4yNSAwbC00IDQgNCA0IDEuNS0xLjUtMi41LTIuNSAyLjUtMi41LTEuNS0xLjV6Jy8lM0UlM0Mvc3ZnJTNFXCIpYCk7XG4gICAgJChcIi5jYXJvdXNlbC1jb250cm9sLW5leHQtaWNvblwiKS5jc3MoXCJiYWNrZ3JvdW5kLWltYWdlXCIsIGB1cmwoXCJkYXRhOmltYWdlL3N2Zyt4bWw7Y2hhcnNldD11dGY4LCUzQ3N2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIGZpbGw9JyR7ZW5jb2RlVVJJQ29tcG9uZW50KGljb25Db2xvcil9JyB2aWV3Qm94PScwIDAgOCA4JyUzRSUzQ3BhdGggZD0nTTIuNzUgMGwtMS41IDEuNSAyLjUgMi41LTIuNSAyLjUgMS41IDEuNSA0LTQtNC00eicvJTNFJTNDL3N2ZyUzRVwiKWApO1xuICAgIFxuICB9KTtcblxuICAvL+ODl+ODreODleOCo+ODvOODq+e3qOmbhueUu+mdoihteXBhZ2UuYmxhZGUucGhwKVxuICAvL+WQjeWJjeWkieabtFxuICAkKCcjbmFtZS1mb3JtJykuc3VibWl0KGZ1bmN0aW9uKCl7XG4gICAgdmFyIGVkaXRlZE5hbWU9JCgnI2Zvcm1fbmFtZScpLnZhbCgpO1xuICAgIC8v5YWl5Yqb44GV44KM44Gf5YaF5a6544KS44OV44Kp44O844Og44Gr6L+95YqgXG4gICAgLy/jg4fjg7zjgr/jga7pgIHkv6FcbiAgICBpZihlZGl0ZWROYW1lIT0nJyl7XG4gICAgICAvL+ODleOCqeODvOODoOWGheOBjOepuuOBp+OBquOBkeOCjOOBsOODh+ODvOOCv+OCkuS4iuabuOOBjVxuICAgICAgJCgnI25hbWUnKS5hdHRyKCd2YWx1ZScsZWRpdGVkTmFtZSk7XG4gICAgICAvL+ODouODvOODgOODq+OCkumWieOBmOOCi1xuICAgICAgJCgnI2VkaXQtbmFtZScpLm1vZGFsKCdoaWRlJyk7XG4gICAgICByZXR1cm4gZmFsc2U7XG4gICAgfWVsc2V7XG4gICAgICAvL+ODouODvOODgOODq+OCkumWieOBmOOCi1xuICAgICAgJCgnI2VkaXQtbmFtZScpLm1vZGFsKCdoaWRlJyk7XG4gICAgICByZXR1cm4gZmFsc2U7XG4gICAgfVxuICB9KTtcbiAgLy/jgqvjg4rlpInmm7RcbiAgJCgnI2thbmEtZm9ybScpLnN1Ym1pdChmdW5jdGlvbigpe1xuICAgIHZhciBlZGl0ZWRLYW5hPSQoJyNmb3JtX2thbmEnKS52YWwoKTtcbiAgICAvL+WFpeWKm+OBleOCjOOBn+WGheWuueOCkuODleOCqeODvOODoOOBq+i/veWKoFxuICAgIC8v44OH44O844K/44Gu6YCB5L+hXG4gICAgaWYoZWRpdGVkS2FuYSE9Jycpe1xuICAgICAgLy/jg5Xjgqnjg7zjg6DlhoXjgYznqbrjgafjgarjgZHjgozjgbDjg4fjg7zjgr/jgpLkuIrmm7jjgY1cbiAgICAgICQoJyNrYW5hJykuYXR0cigndmFsdWUnLGVkaXRlZEthbmEpO1xuICAgICAgLy/jg6Ljg7zjg4Djg6vjgpLplonjgZjjgotcbiAgICAgICQoJyNlZGl0LWthbmEnKS5tb2RhbCgnaGlkZScpO1xuICAgICAgcmV0dXJuIGZhbHNlO1xuICAgIH1lbHNle1xuICAgICAgLy/jg6Ljg7zjg4Djg6vjgpLplonjgZjjgotcbiAgICAgICQoJyNlZGl0LWthbmEnKS5tb2RhbCgnaGlkZScpO1xuICAgICAgcmV0dXJuIGZhbHNlO1xuICAgIH1cbiAgfSk7XG4gIC8v44OL44OD44Kv44ON44O844Og5aSJ5pu0XG4gICQoJyNuaWNrbmFtZS1mb3JtJykuc3VibWl0KGZ1bmN0aW9uKCl7XG4gICAgdmFyIGVkaXRlZE5pY2tuYW1lPSQoJyNmb3JtX25pY2tuYW1lJykudmFsKCk7XG4gICAgLy/lhaXlipvjgZXjgozjgZ/lhoXlrrnjgpLjg5Xjgqnjg7zjg6Djgavov73liqBcbiAgICAvL+ODh+ODvOOCv+OBrumAgeS/oVxuICAgIGlmKGVkaXRlZE5pY2tuYW1lIT0nJyl7XG4gICAgICAvL+ODleOCqeODvOODoOWGheOBjOepuuOBp+OBquOBkeOCjOOBsOODh+ODvOOCv+OCkuS4iuabuOOBjVxuICAgICAgJCgnI25pY2tuYW1lJykuYXR0cigndmFsdWUnLGVkaXRlZE5pY2tuYW1lKTtcbiAgICAgIC8v44Oi44O844OA44Or44KS6ZaJ44GY44KLXG4gICAgICAkKCcjZWRpdC1uaWNrbmFtZScpLm1vZGFsKCdoaWRlJyk7XG4gICAgICByZXR1cm4gZmFsc2U7XG4gICAgfWVsc2V7XG4gICAgICAvL+ODouODvOODgOODq+OCkumWieOBmOOCi1xuICAgICAgJCgnI2VkaXQtbmlja25hbWUnKS5tb2RhbCgnaGlkZScpO1xuICAgICAgcmV0dXJuIGZhbHNlO1xuICAgIH1cbiAgfSk7XG4gIC8v44Oh44O844Or44Ki44OJ44Os44K55aSJ5pu0XG4gICQoJyNlbWFpbC1mb3JtJykuc3VibWl0KGZ1bmN0aW9uKCl7XG4gICAgdmFyIGVkaXRlZEVtYWlsPSQoJyNmb3JtX2VtYWlsJykudmFsKCk7XG4gICAgLy/lhaXlipvjgZXjgozjgZ/lhoXlrrnjgpLjg5Xjgqnjg7zjg6Djgavov73liqBcbiAgICAvL+ODh+ODvOOCv+OBrumAgeS/oVxuICAgIGlmKGVkaXRlZEVtYWlsIT0nJyl7XG4gICAgICAvL+ODleOCqeODvOODoOWGheOBjOepuuOBp+OBquOBkeOCjOOBsOODh+ODvOOCv+OCkuS4iuabuOOBjVxuICAgICAgJCgnI2VtYWlsJykuYXR0cigndmFsdWUnLGVkaXRlZEVtYWlsKTtcbiAgICAgIC8v44Oi44O844OA44Or44KS6ZaJ44GY44KLXG4gICAgICAkKCcjZWRpdC1lbWFpbCcpLm1vZGFsKCdoaWRlJyk7XG4gICAgICByZXR1cm4gZmFsc2U7XG4gICAgfWVsc2V7XG4gICAgICAvL+ODouODvOODgOODq+OCkumWieOBmOOCi1xuICAgICAgJCgnI2VkaXQtZW1haWwnKS5tb2RhbCgnaGlkZScpO1xuICAgICAgcmV0dXJuIGZhbHNlO1xuICAgIH1cbiAgfSk7XG59KSJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/content.js\n");

/***/ }),

/***/ 1:
/*!***************************************!*\
  !*** multi ./resources/js/content.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/ubuntu/dev/kokoiko/resources/js/content.js */"./resources/js/content.js");


/***/ })

/******/ });
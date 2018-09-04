/**
 * 本工具旨在提供一个简便方法, 在用户预约的时候, 或者预约表打开之后改变日期的时候, 可以
 * 更新可以被预约的时间段的选项列表
 */
import axiox from 'axios';
window._ = require('lodash');

const GET_AVAILABLE_TIME_SLOTS_URL = '/api/booking/get-available-time-slot';
export default function getAvailableTimeSlots(date, productUuid,targetSelectElement) {
  return new Promise((resolve, reject) => {
    axiox.post(
        GET_AVAILABLE_TIME_SLOTS_URL,
        {d:date, p: productUuid}
    ).then(res=>{
        if(res.data.error_no === 100){
          targetSelectElement.html('');
          targetSelectElement.append('<option value="">Please choose ... </option>');
          _.each(res.data.data.r,(item,idx)=>{
            let optionEl = '<option value="'+item+'">'+item+'</option>';
            targetSelectElement.append(optionEl);
          });
          // 获取数据成功
          resolve(res.data)
        }else{
          targetSelectElement.html('');
          // 没有获得或者, 指定日期没有可以预定的时间段了
          reject('No vacancy, please try another day!')
        }
    })
  })
}
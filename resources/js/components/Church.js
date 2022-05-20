
/*jshint esversion: 6 */ 

export default function Church(props) {

    /**
    const card = {
        maxWidth: 400,  
       
      };
      
      const container = {
          maxWidth: 900,
          minVh: 400,
      }
       */


    return (
        <div className="col-sm-4">
            <div className="card mb-2">
                <div className="card-header"><h5 className="card-title fst-italic">{props.name}</h5></div>
                <div className="card-body">
                    <p>{props.address}</p>
                    {props.distance && <p className="card-text fw-bold">{parseInt(props.distance).toLocaleString()}m from your current location</p>}
                    <a href={`admin/churches/${props.id}`} className="text-decoration-none btn btn-info" type="button">View Church</a>
                </div>
            </div>
        </div>
    )
}
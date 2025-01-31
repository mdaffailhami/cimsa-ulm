import { Spinner } from 'react-bootstrap';

function MySpinner({ animation = 'grow', color }) {
  return (
    <Spinner
      animation={animation}
      style={{
        color: color,
        width: animation == 'grow' ? '90px' : '40px',
        height: '40px',
      }}
    />
  );
}

export default function LoadingPage({
  animation = 'grow',
  center = true,
  color = 'red',
  height = '95vh',
}) {
  if (center) {
    return (
      <div
        style={{
          display: 'flex',
          justifyContent: 'center',
          alignItems: 'center',
          height: height,
        }}
      >
        <MySpinner animation={animation} color={color} />
      </div>
    );
  } else {
    return <MySpinner color={color} />;
  }
}
